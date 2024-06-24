<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CreditHistory;
use App\Models\Order;
use App\Models\Product;
use App\Models\Referral;
use App\Models\ReferralEarning;
use App\Models\Shipping;
use App\Notifications\StatusNotification;
use App\Rules\MatchOldPassword;
use App\User;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;

class DistributorController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->paginate(10);
        $creditBalance = CreditHistory::whereUserId(auth()->id())->whereStatus('not_paid')->sum('amount');
        return view('distributor.index', compact('orders', 'creditBalance'));
    }

    public function products()
    {
        $products = Product::orderBy('id', 'DESC')->where('dis_price', '>', 0)->paginate(10);
        return view('distributor.pages.products', compact('products'));
    }

    public function transactions()
    {
        $transactions = Order::orderBy('id', 'DESC')->where('user_id', auth()->user()->id)->paginate(20);
        return view('distributor.pages.transaction-order', compact('transactions'));
    }

    public function settings()
    {
        $profile = Auth()->user();
        return view('distributor.pages.settings', compact('profile'));
    }

    public function closeAccount(Request $request)
    {
        $profile = Auth()->user();

        $this->validate($request, ['password' => 'required']);

        if (Auth::attempt(['email' => $profile->email, 'password' => $request->password])) {

            $profile->update(['status' => 'inactive']);

            session()->flash('success', 'Account deactivate successfully!');

            Auth::logout();

            return redirect('/');
        }

        session()->flash('errors', 'Invalid data provided');

        return view('distributor.pages.settings', compact('profile'));
    }

    public function settingsUpdate(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();
        $status = $user->fill($data)->save();
        if ($status) {
            session()->flash('success', 'Successfully updated your profile');
        } else {
            session()->flash('errors', 'Please try again!');
        }
        return redirect()->route('distributor.home');
    }

    public function changePassword()
    {
        return view('user.layouts.userPasswordChange');
    }
    public function changPasswordStore(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);

        User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
        session()->flash('success', 'Password successfully changed');

        return redirect()->route('user')->with('success', 'Password successfully changed');
    }

    public function creditHistory()
    {
        $creditHistories = CreditHistory::whereUserId(auth()->id())->latest()->get()->take(20);
        return view('distributor.pages.credit-history', compact('creditHistories'));
    }

    private function getTotalOrderAmount()
    {
        $userId = auth()->id();
        $totalOrderAmount = Order::where('user_id', $userId)->sum('total_amount');
        return $totalOrderAmount;
    }

    public function makeOrder(Request $request)
    {
        $errors = [];
        $url = session()->get('_previous.url');

        // dd($request->all()); //


        // Validate payment type
        if (!$request->has('payment_type') || !in_array($request->payment_type, ['Credit', 'No Credit'])) {
            $errors['payment_type'] = ["The payment type field is required and must be either 'credit' or 'no credit'."];
        }

        if (!$request->has('shippingId') || !$shipping = Shipping::where('id', $request->shippingId)->first()) {
            $errors['shipping'] = ["You must select a shipping method."];
        }


        // $validatedData = $request->all();



        // Validate credit eligibility
        if ($request->payment_type == 'Credit' && $this->getTotalOrderAmount() < 3000000) {
            session()->flash('errors','You are not eligible to apply for credits.');
            return redirect()->route('distributor.home');
        }

        $totalQuantity = 0;
        $totalPrice = 0;

        foreach ($request->selectedProducts as $productData) {
            // Validate quantity
            // dd($productData);
            if ($productData['quantity'] < 20) {
                $errors['quantity'] = ["Please enter a quantity of at least 20 for each selected product."];
            }

            // Validate product ID
            if ($product = \App\Models\Product::where('id', $productData['id'])->first()) {

                if (!$product->dis_price) {
                    session()->flash('errors', 'Invalid product.');
                    return redirect()->route('distributor.home');
                }

                // Check if product exists and quantity is valid
                if ($product && $productData['quantity'] >= 20) {
                    // Calculate total quantity and price
                    $totalQuantity += $productData['quantity'];
                    $totalPrice += $product->dis_price * $productData['quantity'];

                    $data = [
                        'product_id' => $product->id,
                        'price' => $product->dis_price,
                        'quantity' => $productData['quantity']
                    ];


                    $add = $this->addToCart($data);

                    if ($add['error']) {
                        $errors['stock'] = [$add['message']];
                    }
                }
            } else {
                $errors['productId'] = ["One of the products is not available"];
            }
        }

        // If there are errors, redirect back with errors and input data
        // dd($errors);
        if (!empty($errors)) {
            session()->flash('errors', collect($errors));
            return redirect($url);
        }

        // Validate user profile completeness
        $user = auth()->user();
        if (empty($user->address_one) || empty($user->phone) || empty($user->email)) {
            session()->flash('errors', 'Update your profile first.');
            return redirect()->route('distributor.distributor-settings');
        }


        // Calculate total amount
        $shippingPrice = $shipping->price;

        $subTotal = $totalPrice;
        $totalAmount = $subTotal + $shippingPrice;
        
        try {
            // Create order
            $orderData = [
                'first_name' => $user->name,
                'last_name' => '',
                'country' => $user->country,
                'address1' => $user->address_one,
                'address2' => $user->address_two,
                'phone' => $user->phone,
                'email' => $user->email,
                'shipping_id' => $shipping->id,
                'sub_total' => $subTotal,
                'total_amount' => $totalAmount,
                'quantity' => $totalQuantity,
                'order_number' => 'ORD-' . strtoupper(Str::random(10)),
                'user_id' => $user->id,
                'payment_method' => 'paystack',
                'payment_status' => 'unpaid',
            ];
            // dd($orderData);
            $order = new Order($orderData);
            $order->save();

            // Send notification
            $admins = User::where('role', 'admin')->first();
            $notificationDetails = [
                'title' => 'New ' . ($request->payment_type == 'Credit' ? 'Credit ' : '') . 'order created',
                'actionURL' => route('order.show', $order->id),
                'fas' => 'fa-file-alt',
            ];
            Notification::send($admins, new StatusNotification($notificationDetails));

            // Redirect based on payment type
            if ($request->payment_type == 'Credit') {
                $creditHistory = new CreditHistory([
                    'user_id' => auth()->id(),
                    'product_id' => $product->id,
                    'order_id' => $order->id,
                    'quantity' => $totalQuantity,
                    'amount' => $totalAmount,
                    'status' => 'not_paid',
                ]);
                $creditHistory->save();

                Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);

                session()->flash('success', 'Credit order was successfully created.');
                return redirect()->route('distributor.credit-history');
            } else {
                return redirect()->route('pay', ['id' => $order->id]);
            }
        } catch (\Throwable $th) {
            session()->flash('errors', $th->getMessage());
            return redirect()->route('distributor.credit-history');
        }
    }


    public function addToCart($data)
    {

        $already_cart = Cart::where('user_id', auth()->user()->id)->where('order_id', null)->where('product_id', $data['product_id'])->first();
        if ($already_cart) {
            $already_cart->delete();
        }


        $cart = new Cart;
        $cart->user_id = auth()->user()->id;
        $cart->product_id = $data['product_id'];
        $cart->price = $data['price'];
        $cart->quantity = $data['quantity'];
        $cart->amount = $cart->price * $cart->quantity;
        if ($cart->product->stock < $cart->quantity || $cart->product->stock <= 0) {
            return [
                'error' => true,
                'message' =>  'Stock not sufficient!'
            ];
        } else {

            $cart->save();
            return [
                'error' => false,
                'message' =>  'Added cart successfully'
            ];
        }
    }

    public function referralEarnings()
    {
        $earnings = ReferralEarning::whereUserId(auth()->id())->latest()->get()->take(20);
        return view('distributor.pages.referral-record', compact('earnings'));
    }

    public function referrals()
    {
        $referrals = User::whereReferralId(auth()->id())->latest()->get()->take(20);
        return view('distributor.pages.referrals', compact('referrals'));
    }


}
