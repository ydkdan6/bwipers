<?php

namespace App\Http\Controllers;

use App\Models\CreditHistory;
use App\Models\Order;
use App\Models\Product;
use App\Models\Shipping;
use App\Notifications\StatusNotification;
use App\Rules\MatchOldPassword;
use App\User;
use Helper;
use Illuminate\Http\Request;
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

    public function settingsUpdate(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();
        $status = $user->fill($data)->save();
        if ($status) {
            notify()->success('Successfully updated your profile');
        } else {
            notify()->error('Please try again!');
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
        notify()->success('Password successfully changed');

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

        // Validate quantity
        if (!$request->has('quantity') || !is_numeric($request->quantity) || $request->quantity < 50) {
            $errors['quantity'] = ["The quantity field is required and must be a number greater than or equal to 50."];
        }

        // Validate payment type
        if (!$request->has('payment_type') || !in_array($request->payment_type, ['Credit', 'No Credit'])) {
            $errors['payment_type'] = ["The payment type field is required and must be either 'credit' or 'no credit'."];
        }

        // Validate product ID
        if (!$request->has('productId') || !\App\Models\Product::where('id', $request->productId)->exists()) {
            $errors['productId'] = ["The product ID field is required and the selected product ID is invalid." . $request->productId];
        }

        // If there are errors, redirect back with errors and input data
        if (!empty($errors)) {
            session()->flash('errors', collect($errors));
            return redirect($url);
        }

        $validatedData = $request->all();

        // Validate user profile completeness
        $user = auth()->user();
        if (empty($user->address_one) || empty($user->phone) || empty($user->email)) {
            notify()->error('Update your profile first.');
            return redirect()->route('distributor.distributor-settings');
        }

        // Validate credit eligibility
        if ($request->payment_type == 'Credit' && $this->getTotalOrderAmount() < 3000000) {
            notify()->error('You are not eligible to apply for credits.');
            return redirect()->route('distributor.home');
        }

        // Fetch product
        $product = Product::findOrFail($validatedData['productId']);
        if (!$product->dis_price) {
            notify()->error('Invalid product.');
            return redirect()->route('distributor.home');
        }

        // Calculate total amount
        $shippingPrice = Shipping::findOrFail(1)->price;
        $subTotal = $validatedData['quantity'] * $product->dis_price;
        $totalAmount = $subTotal + $shippingPrice;

        // Create order
        $orderData = array_merge($validatedData, [
            'first_name' => $user->name,
            'last_name' => '',
            'country' => $user->country,
            'address1' => $user->address_one,
            'address2' => $user->address_two,
            'phone' => $user->phone,
            'email' => $user->email,
            'shipping_id' => 1,
            'sub_total' => $subTotal,
            'total_amount' => $totalAmount,
            'order_number' => 'ORD-' . strtoupper(Str::random(10)),
            'user_id' => $user->id,
            'payment_method' => 'paystack',
            'payment_status' => 'unpaid',
        ]);

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
                'quantity' => $validatedData['quantity'],
                'amount' => $totalAmount,
                'status' => 'not_paid',
            ]);
            $creditHistory->save();

            notify()->success('Credit order was successfully created.');
            return redirect()->route('distributor.credit-history');
        } else {
            return redirect()->route('pay', ['id' => $order->id]);
        }
    }


    // public function makeOrder(Request $request)
    // {
        // $errors = [];
        // $url = session()->get('_previous.url');

        // // dd($request->all()); //

        // // Validate quantity
        // if (!$request->has('quantity') || !is_numeric($request->quantity) || $request->quantity < 50) {
        //     $errors['quantity'] = ["The quantity field is required and must be a number greater than or equal to 50."];
        // }

        // // Validate payment type
        // if (!$request->has('payment_type') || !in_array($request->payment_type, ['Credit', 'No Credit'])) {
        //     $errors['payment_type'] = ["The payment type field is required and must be either 'credit' or 'no credit'."];
        // }

        // // Validate product ID
        // if (!$request->has('productId') || !\App\Models\Product::where('id', $request->productId)->exists()) {
        //     $errors['productId'] = ["The product ID field is required and the selected product ID is invalid." . $request->productId];
        // }

        // // If there are errors, redirect back with errors and input data
        // if (!empty($errors)) {
        //     session()->flash('errors', collect($errors));
        //     return redirect($url);
        // }

    //     // return redirect()->route('distributor.home');
    //     if (empty(auth()->user()->address_one) || empty(auth()->user()->phone) || empty(auth()->user()->email)) {
    //         notify()->error('Update your profile first.');
    //         return redirect()->route('distributor.distributor-settings');
    //     }

    //     if ($request->payment_type == 'Credit' && $this->getTotalOrderAmount() < 3000000) {
    //         notify()->error('You are not eligible to apply for credits.');
    //         return redirect()->route('distributor.home');
    //     }

    //     $product = Product::where('id', $request->productId)->where('dis_price', '>', 0)->first();

    //     if (!$product) {
    //         notify()->error('Invalid product.');
    //         return redirect()->route('distributor.home');
    //     }

    //     // dd($product->dis_price);

    //     $order_data = $request->all();
    //     $order_data['first_name'] = auth()->user()->name;
    //     $order_data['last_name'] = '';
    //     $order_data['country'] = auth()->user()->country;
    //     // $order_data['post_code'] = auth()->user()->post_code;
    //     $order_data['address1'] = auth()->user()->address_one;
    //     $order_data['address2'] = auth()->user()->address_two;
    //     $order_data['phone'] = auth()->user()->phone;
    //     $order_data['email'] = auth()->user()->email;
    //     $order_data['shipping_id'] = 1;
    //     $shipping = Shipping::where('id', $order_data['shipping_id'])->pluck('price');

    //     // dd($shipping[0]);

    //     $sub_total =  $order_data['quantity'] * $product->dis_price;
    //     $total_amount =  $sub_total + $shipping[0];
    //     $order_data['order_number'] = 'ORD-' . strtoupper(Str::random(10));
    //     $order_data['user_id'] = auth()->user()->id;
    //     // $order_data['status'] = "new";
    //     $order_data['payment_method'] = 'paystack';
    //     $order_data['payment_status'] = 'unpaid';
    //     $order_data['sub_total'] = $sub_total;
    //     $order_data['total_amount'] = $total_amount;

    //     $admins = User::where('role', 'admin')->first();

    //     if ($request->payment_type == 'Credit') {
    //         $order = new Order();

    //         $order->fill($order_data);
    //         $status = $order->save();

    //         $creditHistory = new CreditHistory();

    //         $creditHistory->user_id = auth()->id();
    //         $creditHistory->product_id = $product->id;
    //         $creditHistory->order_id = $order->id;
    //         $creditHistory->quantity = $order_data['quantity'];
    //         $creditHistory->amount = $total_amount;
    //         $creditHistory->status = 'not_paid';
    //         $creditHistory->save();


    //         $details = [
    //             'title' => 'New Credit order created',
    //             'actionURL' => route('order.show', $order->id),
    //             'fas' => 'fa-file-alt'
    //         ];
    //         Notification::send($admins, new StatusNotification($details));

    //         notify()->success('Order was successfully created.');
    //         return redirect()->route('distributor.credit-history')->with('success', 'Order was successfully created.');
    //     } elseif ($request->payment_type == 'No Credit') {

    //         $order = new Order();

    //         $order->fill($order_data);
    //         $status = $order->save();
    //         if ($order)
    //             $details = [
    //                 'title' => 'New order created',
    //                 'actionURL' => route('order.show', $order->id),
    //                 'fas' => 'fa-file-alt'
    //             ];
    //         Notification::send($admins, new StatusNotification($details));

    //         return redirect()->route('pay')->with(['id' => $order->id]);
    //     }



    // $this->validate($request,[
    //     'first_name'=>'string|required',
    //     'last_name'=>'string|required',
    //     'address1'=>'string|required',
    //     'address2'=>'string|nullable',
    //     'coupon'=>'nullable|numeric',
    //     'phone'=>'numeric|required',
    //     'post_code'=>'string|nullable',
    //     'email'=>'string|required'
    // ]);
    // // return $request->all();

    // if(empty(Cart::where('user_id',auth()->user()->id)->where('order_id',null)->first())){
    // request()->session()->flash('error','Cart is Empty !');
    // return back();
    // }
    // $cart=Cart::get();
    // // return $cart;
    // $cart_index='ORD-'.strtoupper(uniqid());
    // $sub_total=0;
    // foreach($cart as $cart_item){
    //     $sub_total+=$cart_item['amount'];
    //     $data=array(
    //         'cart_id'=>$cart_index,
    //         'user_id'=>$request->user()->id,
    //         'product_id'=>$cart_item['id'],
    //         'quantity'=>$cart_item['quantity'],
    //         'amount'=>$cart_item['amount'],
    //         'status'=>'new',
    //         'price'=>$cart_item['price'],
    //     );

    //     $cart=new Cart();
    //     $cart->fill($data);
    //     $cart->save();
    // }

    // $total_prod=0;
    // if(session('cart')){
    //         foreach(session('cart') as $cart_items){
    //             $total_prod+=$cart_items['quantity'];
    //         }
    // }

    // $order=new Order();
    // $order_data=$request->all();
    // $order_data['order_number']='ORD-'.strtoupper(Str::random(10));
    // $order_data['user_id']=$request->user()->id;
    // $order_data['shipping_id']=$request->shipping;
    // $shipping=Shipping::where('id',$order_data['shipping_id'])->pluck('price');
    // // return session('coupon')['value'];
    // $order_data['sub_total']=Helper::totalCartPrice();
    // $order_data['quantity']=Helper::cartCount();



    // if(session('coupon')){
    //     $order_data['coupon']=session('coupon')['value'];
    // }
    // if($request->shipping){
    //     if(session('coupon')){
    //         $order_data['total_amount']=Helper::totalCartPrice()+$shipping[0]-session('coupon')['value'];
    //     }
    //     else{
    //         $order_data['total_amount']=Helper::totalCartPrice()+$shipping[0];
    //     }
    // }
    // else{
    //     if(session('coupon')){
    //         $order_data['total_amount']=Helper::totalCartPrice()-session('coupon')['value'];
    //     }
    //     else{
    //         $order_data['total_amount']=Helper::totalCartPrice();
    //     }
    // }
    // // return $order_data['total_amount'];
    // $order_data['status']="new";
    // if(request('payment_method')=='paypal'){
    //     $order_data['payment_method']='paypal';
    //     $order_data['payment_status']='paid';
    // }
    // else{
    //     $order_data['payment_method']='cod';
    //     $order_data['payment_status']='Unpaid';
    // }
    // $order->fill($order_data);
    // $status=$order->save();
    // if($order)
    // // dd($order->id);
    // $users=User::where('role','admin')->first();
    // $details=[
    //     'title'=>'New order created',
    //     'actionURL'=>route('order.show',$order->id),
    //     'fas'=>'fa-file-alt'
    // ];
    // Notification::send($users, new StatusNotification($details));
    // if(request('payment_method')=='paypal'){
    //     return redirect()->route('payment')->with(['id'=>$order->id]);
    // }
    // else{
    //     session()->forget('cart');
    //     session()->forget('coupon');
    // }
    // Cart::where('user_id', auth()->user()->id)->where('order_id', null)->update(['order_id' => $order->id]);

    // // dd($users);        
    // request()->session()->flash('success','Your product successfully placed in order');
    // return redirect()->route('home');
    // }


}
