<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CreditHistory;
use App\Models\Order;
use App\Models\Product;
use App\Models\Referral;
use App\Models\ReferralEarning;
use App\User;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Paystack;

class PaymentController extends Controller
{

    /**
     * Redirect the User to Paystack Payment Page
     * @return Url
     */
    public function redirectToGateway($id)
    {
        try {
            $user = auth()->user();
            $cartItems = $this->getCartItems($user->id);

            if (empty($cartItems)) {
                session()->flash('errors', 'Your cart is empty.');
                return redirect()->back();
            }

            $orderData = $this->prepareOrderData($cartItems, $id, $user);

            $this->updateCartWithOrderId($user->id, $id);

            $paymentData = $this->preparePaymentData($orderData, $user);

            return $this->processPay($paymentData);
        } catch (Exception $e) {
            Log::error('Error in redirectToGateway: ' . $e->getMessage());
            session()->flash('errors', 'Something went wrong. Please try again.');
            return redirect()->back();
        }
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        try {
            $paymentDetails = paystack()->getPaymentData();

            if (!$paymentDetails['status']) {
                session()->flash('errors', 'Payment failed. Please try again.');
                return redirect()->back();
            }

            $metadata = $paymentDetails['data']['metadata'];
            $redirectUrl = $metadata['redirect_url'];
            $paymentType = $metadata['type'];
            $orderId = $metadata['order_id'];
            $email = $metadata['email'];

            if ($paymentType === 'credit_pay') {
                $this->processCreditPayment($orderId);
            } else {
                session()->forget('cart');
                session()->forget('coupon');
            }

            $this->handleReferralEarnings($email, $orderId);
            $this->updateOrderStatus($orderId);
            notify()->success('You successfully paid with Paystack! Thank you.');
            return redirect($redirectUrl);
        } catch (Exception $e) {
            Log::error('Error in handleGatewayCallback: ' . $e->getMessage());
            session()->flash('errors', 'Something went wrong. Please try again.');
            return redirect()->back();
        }
    }

    protected function updateOrderStatus($orderId)
    {
        $order = Order::where('id', $orderId)->first();

        if ($order) {
            $order->payment_status = 'paid';
            $order->save();
        } else {
            Log::warning('Order not found for order ID: '. $orderId);
        }
    }

    protected function processCreditPayment($orderId)
    {
        $credit = CreditHistory::firstWhere('order_id', $orderId);

        if ($credit) {
            $credit->status = 'paid';
            $credit->save();
        } else {
            Log::warning('Credit history not found for order ID: ' . $orderId);
        }
    }

    protected function handleReferralEarnings($email, $orderId)
    {
        $user = User::where('email', $email)->first();

        if (!$user) {
            Log::warning('User not found: ' . $email);
            return;
        }

        if ($user->role !== 'sales_person') {
            Log::warning('User is not a sales person: ' . $email);
            return;
        }

        $referral = Referral::where('user_id', $user->referral_id)->first();

        if (!$referral) {
            Log::warning('Referral not found for user ID: ' . $user->id);
            return;
        }

        $distributor = $referral->user;
        $distributor->earnings += 100;
        $distributor->save();

        ReferralEarning::create([
            'user_id' => $distributor->id,
            'order_id' => $orderId,
            'sales_person_name' => $user->name,
            'email' => $user->email,
            'amount' => 100,
        ]);
    }

    protected function getCartItems($userId)
    {
        return Cart::where('user_id', $userId)
            ->where('order_id', null)
            ->get();
    }

    protected function prepareOrderData($cartItems, $orderId, $user)
    {
        $items = $cartItems->map(function ($item) {
            $product = Product::find($item->product_id);
            return [
                'name' => $product->title,
                'price' => $item->price,
                'desc' => 'Thank you for using paystack',
                'qty' => $item->quantity
            ];
        })->toArray();

        $totalAmount = array_reduce($items, function ($total, $item) {
            return $total + ($item['price'] * $item['qty']);
        }, 0);

        $metadata = [
            'invoice_id' => 'ORD-' . strtoupper(uniqid()),
            'invoice_description' => "Order #{$orderId} Invoice",
            'order_id' => $orderId,
            'redirect_url' => route('home'),
            'type' => 'normal_pay',
            'email' => $user->email,
            'shipping_discount' => session('coupon')['value'] ?? 0,
        ];

        return [
            'items' => $items,
            'amount' => $totalAmount,
            'metadata' => $metadata,
        ];
    }

    protected function updateCartWithOrderId($userId, $orderId)
    {
        Cart::where('user_id', $userId)
            ->where('order_id', null)
            ->update(['order_id' => $orderId]);
    }

    protected function preparePaymentData($orderData, $user)
    {
        return [
            'amount' => $orderData['amount'] * 100,  // Paystack expects the amount in kobo
            'email' => $user->email,
            'callback_url' => route('payment.callback'),
            'metadata' => $orderData['metadata'],
        ];
    }

    public function creditPay(CreditHistory $creditHistory)
    {
        if ($creditHistory->status == 'not_paid') {

            $orderData = [];

            // $name = Product::where('id', $creditHistory->product_id)->pluck('title');

            $orderData['metadata']['invoice_id'] = 'ORD-' . strtoupper(uniqid());
            $orderData['metadata']['invoice_description'] = "Order #{$orderData['metadata']['invoice_id']} Invoice";
            $orderData['metadata']['order_id'] = $creditHistory->order_id;
            $orderData['metadata']['type'] = 'credit_pay';
            $orderData['metadata']['redirect_url'] = route('distributor.home');

            $data = [
                'amount' =>   $creditHistory['amount'] * 100,
                'email' =>  auth()->user()->email,
                'callback_url' => route('payment.callback'),
                'metadata' =>  $orderData['metadata'],
            ];

            return $this->processPay($data);
        }

        session()->flash('error', 'Something went wrong please try again!!!');

        return redirect()->route('distributor.credit-history');
    }


    private function processPay($data)
    {
        try {
            return paystack()->getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            session()->flash('error', 'The paystack token has expired. Please refresh the page and try again.');
            return Redirect::back();
        }
    }
}
