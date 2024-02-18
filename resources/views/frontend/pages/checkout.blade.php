@extends('frontend.layouts.shop')

@section('title','Checkout page')

@section('main-content')

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb shop-breadcrumb bb-no">
                <li class="passed"><a href="{{route('cart')}}">Shopping Cart</a></li>
                <li class="active"><a href="{{route('checkout')}}">Checkout</a></li>
                <li><a href="#">Order Complete</a></li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <div class="page-content">
        <div class="container">
            {{-- <div class="login-toggle">
                Returning customer? <a href="#"
                    class="show-login font-weight-bold text-uppercase text-dark">Login</a>
            </div> --}}
            {{-- <form class="login-content" >
                <p>If you have shopped with us before, please enter your details below. 
                    If you are a new customer, please proceed to the Billing section.</p>
                <div class="row">
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Username or email *</label>
                            <input type="text" class="form-control form-control-md" name="name"
                                required>
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <div class="form-group">
                            <label>Password *</label>
                            <input type="text" class="form-control form-control-md" name="password"
                                required>
                        </div>
                    </div>
                </div>
                <div class="form-group checkbox">
                    <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                    <label for="remember" class="mb-0 lh-2">Remember me</label>
                    <a href="#" class="ml-3">Last your password?</a>
                </div>
                <button class="btn btn-rounded btn-login">Login</button>
            </form>
            <div class="coupon-toggle">
                Have a coupon? <a href="#"
                    class="show-coupon font-weight-bold text-uppercase text-dark">Enter your
                    code</a>
            </div> --}}
            {{-- <div class="coupon-content mb-4">
                <p>If you have a coupon code, please apply it below.</p>
                <div class="input-wrapper-inline">
                    <input type="text" name="coupon_code" class="form-control form-control-md mr-1 mb-2" placeholder="Coupon code" id="coupon_code">
                    <button type="submit" class="btn button btn-rounded btn-coupon mb-2" name="apply_coupon" value="Apply coupon">Apply Coupon</button>
                </div>
            </div> --}}
            <form class="form checkout-form" method="POST" action="{{route('cart.order')}}">
                <div class="row mb-9">
                    <div class="col-lg-7 pr-lg-4 mb-4">
                        <h3 class="title billing-title text-uppercase ls-10 pt-1 pb-3 mb-0">
                            Billing Details
                        </h3>
                        <div class="row gutter-sm">
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>First name *</label>
                                    <input type="text" class="form-control form-control-md" name="first_name"
                                        required value="{{old('first_name')}}">
                                     @error('first_name')
                                        <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group">
                                    <label>Last name *</label>
                                    <input type="text" class="form-control form-control-md" name="last_name"
                                        required  value="{{old('last_name')}}">
                                        @error('last_name')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                                </div>
                            </div>
                        </div>
                        {{-- <div class="form-group">
                            <label>Company name (optional)</label>
                            <input type="text" class="form-control form-control-md" name="company-name">
                        </div> --}}
                        <div class="form-group">
                            <label>Country / Region *</label>
                            <div class="select-box">
                                <select name="country" class="form-control form-control-md">
                                    <option value="ng" selected="selected">Nigeria
                                        (NG)
                                    </option>
                                    <option value="ng">Nigeria (NG)</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Street address *</label>
                            <input type="text" placeholder="House number and street name"
                                class="form-control form-control-md mb-2" name="address1" required value="{{old('address1')}}">
                                @error('address1')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                            <input type="text" placeholder="Apartment, suite, unit, etc. (optional)"
                                class="form-control form-control-md" name="address2">
                                @error('address2')
                                                <span class='text-danger'>{{$message}}</span>
                                            @enderror
                        </div>
                        <div class="row gutter-sm">
                            <div class="col-md-12">
                                {{-- <div class="form-group">
                                    <label>Town / City *</label>
                                    <input type="text" class="form-control form-control-md" name="town" required>
                                </div> --}}
                                <div class="form-group">
                                    <label>Postal code *</label>
                                    <input type="text" class="form-control form-control-md" name="post_code" requiredvalue="{{old('post_code')}}">
                                    @error('post_code')
                                        <span class='text-danger'>{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>State *</label>
                                    <div class="select-box">
                                        <select name="state" class="form-control form-control-md">
                                            <option value="default" selected="selected">Abuja</option>
                                            <option value="abia">Abia Umuahia</option>
                                            <option value="abj">Abuja</option>
                                            <option value="lag">Lagos</option>
                                            <option value="ph">Port Harcourt</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input type="number" class="form-control form-control-md" name="phone" required value="{{old('phone')}}">
                                    @error('phone')
                                    <span class='text-danger'>{{$message}}</span>
                                @enderror
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-7">
                            <label>Email address *</label>
                            <input type="email" class="form-control form-control-md" name="email" required value="{{old('email')}}">
                            @error('email')
                            <span class='text-danger'>{{$message}}</span>
                        @enderror
                        </div>
                        {{-- <div class="form-group checkbox-toggle pb-2">
                            <input type="checkbox" class="custom-checkbox" id="shipping-toggle"
                                name="shipping-toggle">
                            <label for="shipping-toggle">Ship to a different address?</label>
                        </div> --}}
                        {{-- <div class="checkbox-content">
                            <div class="row gutter-sm">
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>First name *</label>
                                        <input type="text" class="form-control form-control-md" name="firstname"
                                            required>
                                    </div>
                                </div>
                                <div class="col-xs-6">
                                    <div class="form-group">
                                        <label>Last name *</label>
                                        <input type="text" class="form-control form-control-md" name="lastname"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Country / Region *</label>
                                <div class="select-box">
                                    <select name="country" class="form-control form-control-md">
                                        <option value="default" selected="selected">Nigeria
                                            (NIG)
                                        </option>
                                        <option value="nig">Nigeria</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Street address *</label>
                                <input type="text" placeholder="House number and street name"
                                    class="form-control form-control-md mb-2" name="street-address-1" required>
                                <input type="text" placeholder="Apartment, suite, unit, etc. (optional)"
                                    class="form-control form-control-md" name="street-address-2" required>
                            </div>
                            <div class="row gutter-sm">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Town / City *</label>
                                        <input type="text" class="form-control form-control-md" name="town" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Postcode *</label>
                                        <input type="text" class="form-control form-control-md" name="postcode" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Country (optional)</label>
                                        <input type="text" class="form-control form-control-md" name="zip" required>
                                    </div>
                                </div>
                            </div>
                        </div> --}}

                        <div class="form-group mt-3">
                            <label for="order-notes">Order notes (optional)</label>
                            <textarea class="form-control mb-0" id="order-notes" name="order_notes" cols="30"
                                rows="4"
                                placeholder="Notes about your order, e.g special notes for delivery"  value="{{old('order_notes')}}"></textarea>
                                @error('order_notes')
                                <span class='text-danger'>{{$message}}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-5 mb-4 sticky-sidebar-wrapper">
                        <div class="order-summary-wrapper sticky-sidebar">
                            <h3 class="title text-uppercase ls-10">Your Order</h3>
                            <div class="order-summary">
                                <table class="order-table">
                                    <thead>
                                        <tr class="cart-subtotal bb-no">
                                            <td colspan="3 text-left">
                                                <b>Product</b>
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach(Helper::getAllProductFromCart() as $key=>$cart)
                                        <tr class="bb-no">
                                            <td class="product-name">{{$cart->product['title']}} <i
                                                    class="fas fa-times"></i> <span
                                                    class="product-quantity">{{$cart->quantity}}</span></td>
                                            <td class="product-total">₦{{number_format($cart['price'],2)}}</td>
                                        </tr>
                                        @endforeach
                                        
                                        <tr class="cart-subtotal bb-no">
                                            <td>
                                                <b>Subtotal</b>
                                            </td>
                                            <td>
                                                <b>₦{{number_format(Helper::totalCartPrice(),2)}}</b>
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="shipping-methods">
                                            <td colspan="2" class="text-left">
                                                <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping
                                                </h4>
                                                <ul id="shipping-method" class="mb-4">
                                                    <li>
                                                    @if(count(Helper::shipping())>0 && Helper::cartCount()>0)
                                                    <select name="shipping" class="form-control">
                                                        <option value="">Select your destination</option>
                                                        @foreach(Helper::shipping() as $shipping)
                                                        <option value="{{$shipping->id}}" class="shippingOption" data-price="{{$shipping->price}}">{{$shipping->type}}: ₦{{$shipping->price}}</option>
                                                        @endforeach
                                                    </select>
                                                @else 
                                                    <span>Free</span>
                                                @endif
                                                    </li>
                                                    @if(session('coupon'))
                                            <li class="coupon_price" data-price="{{session('coupon')['value']}}">You Save<span> ₦{{number_format(session('coupon')['value'],2)}}</span></li>
                                            @endif
                                            @php
                                                $total_amount=Helper::totalCartPrice();
                                                if(session('coupon')){
                                                    $total_amount=$total_amount-session('coupon')['value'];
                                                }
                                            @endphp
                                            @if(session('coupon'))
                                                <li class="last"  id="order_total_price">Total<span> ₦{{number_format($total_amount,2)}}</span></li>
                                            @else
                                                <li class="last"  id="order_total_price">Total<span> ₦{{number_format($total_amount,2)}}</span></li>
                                            @endif
                                                    {{-- <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="local-pickup"
                                                                class="custom-control-input" name="shipping">
                                                            <label for="local-pickup"
                                                                class="custom-control-label color-dark">Local
                                                                Pickup</label>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div class="custom-radio">
                                                            <input type="radio" id="flat-rate"
                                                                class="custom-control-input" name="shipping">
                                                            <label for="flat-rate"
                                                                class="custom-control-label color-dark">Delivery
                                                                Fee: #1000.00</label>
                                                        </div>
                                                    </li> --}}
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <td>
                                                <b>Total</b>
                                            </td>
                                            <td>
                                                <b>₦{{number_format(Helper::totalCartPrice(),2)}}</b>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>

                                <div class="payment-methods" id="payment_method">
                                    <h4 class="title font-weight-bold ls-25 pb-0 mb-1">Payment Methods</h4>
                                    <div class="accordion payment-accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#cash-on-delivery" class="collapse">Direct Bank Transfor</a>
                                            </div>
                                            <div id="cash-on-delivery" class="card-body expanded">
                                                <p class="mb-0">
                                                    Make your payment directly into our bank account. 
                                                    Please use your Order ID as the payment reference. 
                                                    Your order will not be shipped until the funds have cleared in our account.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#payment" class="expand">Check Payments</a>
                                            </div>
                                            <div id="payment" class="card-body collapsed">
                                                <p class="mb-0">
                                                    Please send a check to Store Name, Store Street, Store Town, Store State / County, Store Postcode.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#delivery" class="expand">Cash on delivery</a>
                                            </div>
                                            <div id="delivery" class="card-body collapsed">
                                                <p class="mb-0">
                                                    Pay with cash upon delivery.
                                                </p>
                                            </div>
                                        </div>
                                        <div class="card p-relative">
                                            <div class="card-header">
                                                <a href="#paypal" class="expand">Paypal</a>
                                            </div>
                                            <a href="https://www.paypal.com/us/webapps/mpp/paypal-popup" class="text-primary paypal-que" 
                                                onclick="javascript:window.open('https://www.paypal.com/us/webapps/mpp/paypal-popup','WIPaypal',
                                                'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=yes, resizable=yes, width=1060, height=700'); 
                                                return false;">What is PayPal?
                                            </a>
                                            <div id="paypal" class="card-body collapsed">
                                                <p class="mb-0">
                                                    Pay via PayPal, you can pay with your credit cart if you
                                                    don't have a PayPal account.
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group place-order pt-6">
                                    <button type="submit" class="btn btn-dark btn-block btn-rounded">Place Order</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
            
@endsection
@push('styles')
	<style>
		li.shipping{
			display: inline-flex;
			width: 100%;
			font-size: 14px;
		}
		li.shipping .input-group-icon {
			width: 100%;
			margin-left: 10px;
		}
		.input-group-icon .icon {
			position: absolute;
			left: 20px;
			top: 0;
			line-height: 40px;
			z-index: 3;
		}
		.form-select {
			height: 30px;
			width: 100%;
		}
		.form-select .nice-select {
			border: none;
			border-radius: 0px;
			height: 40px;
			background: #f6f6f6 !important;
			padding-left: 45px;
			padding-right: 40px;
			width: 100%;
		}
		.list li{
			margin-bottom:0 !important;
		}
		.list li:hover{
			background:#F7941D !important;
			color:white !important;
		}
		.form-select .nice-select::after {
			top: 14px;
		}
	</style>
@endpush
@push('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
	</script>
	<script>
		function showMe(box){
			var checkbox=document.getElementById('shipping').style.display;
			// alert(checkbox);
			var vis= 'none';
			if(checkbox=="none"){
				vis='block';
			}
			if(checkbox=="block"){
				vis="none";
			}
			document.getElementById(box).style.display=vis;
		}
	</script>
	<script>
		$(document).ready(function(){
			$('.shipping select[name=shipping]').change(function(){
				let cost = parseFloat( $(this).find('option:selected').data('price') ) || 0;
				let subtotal = parseFloat( $('.order_subtotal').data('price') ); 
				let coupon = parseFloat( $('.coupon_price').data('price') ) || 0; 
				// alert(coupon);
				$('#order_total_price span').text('$'+(subtotal + cost-coupon).toFixed(2));
			});

		});

	</script>

@endpush