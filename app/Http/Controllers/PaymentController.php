<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CreditHistory;
use App\Models\Product;
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
        // dd($id);
        // $orderData = array(
        //     "amount" => 700 * 100,
        //     "reference" => '4g4g5485g8545jg8gj' . uniqid(),
        //     "email" => 'user@mail.com',
        //     "currency" => "NGN",
        //     "orderID" => 23456,
        // );

        $cart = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->get()->toArray();

        $orderData = [];

        // return $cart;
        $orderData['items'] = array_map(function ($item) use ($cart) {
            $name = Product::where('id', $item['product_id'])->pluck('title');
            return [
                'name' => $name,
                'price' => $item['price'],
                'desc'  => 'Thank you for using paystack',
                'qty' => $item['quantity']
            ];
        }, $cart);

        $orderData['metadata']['invoice_id'] = 'ORD-' . strtoupper(uniqid());
        $orderData['metadata']['invoice_description'] = "Order #{$orderData['metadata']['invoice_id']} Invoice";
        $orderData['metadata']['order_id'] = $id;
        $orderData['metadata']['redirect_url'] = route('home');
        $orderData['metadata']['type'] = 'normal_pay';
        // $orderData['metadata']['cancel_url'] = route('payment.cancel');

        $total = 0;
        foreach ($orderData['items'] as $item) {
            $total += $item['price'] * $item['qty'];
        }

        $orderData['amount'] = $total;



        if (session('coupon')) {
            $orderData['metadata']['shipping_discount'] = session('coupon')['value'];
        }
        Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $id]);

        $data = [
            'amount' =>  $orderData['amount']  * 100,
            'email' =>  auth()->user()->email,
            'callback_url' => route('payment.callback'),
            'metadata' =>  $orderData['metadata'],
        ];

        return $this->processPay($data);
    }

    /**
     * Obtain Paystack payment information
     * @return void
     */
    public function handleGatewayCallback()
    {
        $paymentDetails = paystack()->getPaymentData();

// dd($paymentDetails);
        if ($paymentDetails['status']) {
            $redirect_url = $paymentDetails['data']['metadata']['redirect_url'];
            $type = $paymentDetails['data']['metadata']['type'];
            $order_id = $paymentDetails['data']['metadata']['order_id'];

            if ($type == 'credit_pay') {

                $credit = CreditHistory::firstWhere('order_id', $order_id);

                if ($credit) {
                    $credit->status = 'paid';
                    $credit->save();
                }
            } else {

                session()->forget('cart');
                session()->forget('coupon');
            }

            notify()->success('You successfully pay with Paystack! Thank You');
            return redirect($redirect_url);
        }

        notify()->error('Something went wrong please try again!!!');
        return redirect()->back();
        // Now you have the payment details,
        // you can store the authorization_code in your db to allow for recurrent subscriptions
        // you can then redirect or do whatever you want
    }

    public function creditPay(CreditHistory $creditHistory)
    {
        if ($creditHistory->status == 'not_paid') {

            $orderData = [];

            $name = Product::where('id', $creditHistory->product_id)->pluck('title');

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

        notify()->error('Something went wrong please try again!!!');
        return redirect()->route('distributor.credit-history');
    }


    private function processPay($data)
    {
        try {
            return paystack()->getAuthorizationUrl($data)->redirectNow();
        } catch (\Exception $e) {
            notify()->error('The paystack token has expired. Please refresh the page and try again.');
            return Redirect::back();
        }
    }
}
