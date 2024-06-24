@extends('frontend.layouts.shop')
@section('title','Cart')
@section('main-content')
	 <!-- Start of Breadcrumb -->
	 <nav class="breadcrumb-nav">
		<div class="container">
			<ul class="breadcrumb shop-breadcrumb bb-no">
				<li class="active"><a href="cart.html">Shopping Cart</a></li>
				<li><a href="checkout.html">Checkout</a></li>
				<li><a href="order.html">Order Complete</a></li>
			</ul>
		</div>
	</nav>
	<!-- End of Breadcrumb -->

	<!-- Start of PageContent -->
	<div class="page-content">
		<div class="container">
			<div class="row gutter-lg mb-10">
				@if (count(Helper::getAllProductFromCart()) !== 0)
				<div class="col-lg-8 pr-lg-4 mb-6">
					
					<table class="shop-table cart-table">
						<thead>
							<tr>
								<th class="product-name"><span>Product</span></th>
								<th></th>
								<th class="product-price"><span>Price</span></th>
								<th class="product-quantity"><span>Quantity</span></th>
								<th class="product-subtotal"><span>Subtotal</span></th>
							</tr>
						</thead>
						<tbody>
							<form action="{{route('cart.update')}}" method="POST">
								@csrf
								
								@foreach(Helper::getAllProductFromCart() as $key=>$cart)
									<tr>
										@php
										// dd($cart->quantity);
											$photo=explode(',',$cart->product['photo']);
										@endphp
										<td class="product-thumbnail">
											<div class="p-relative">
												<a href="{{route('product-detail',$cart->product['slug'])}}">
													<figure>
														<img src="{{$photo[0]}}" alt="product"
															width="300" height="338">
													</figure>
												</a>
												<button type="button" onclick="clearItem('{{route('cart-delete',$cart->id)}}')" type="button" class="btn btn-close"><i
														class="fas fa-times"></i></button>
											</div>
										</td>
										<td class="product-name">
											<a href="{{route('product-detail',$cart->product['slug'])}}">
												{{$cart->product['title']}}
											</a>
										</td>
										<td class="product-price"><span class="amount">₦{{number_format($cart['price'],2)}}</span></td>
										<td class="product-quantity">
											<div class="input-group">
												<input type="text" name="quant[{{$key}}]" class="form-control"  data-min="1" data-max="100" value="{{$cart->quantity}}">
													<input type="hidden" name="qty_id[]" value="{{$cart->id}}">

												{{-- <input class="quantit form-control" type="number" id="quantity_{{ $cart->id }}" 
													onchange="onInputCount('{{ $cart->id }}',{{ $cart->price }})"  value="{{ $cart->quantity }}"> --}}
                {{-- <button class="quantity-plus w-icon-plus" type="button" onclick="ix('{{ $cart->id }}')"></button>
                <button class="quantity-minus w-icon-minus" type="button" onclick="dx('{{ $cart->id }}')"></button> --}}
            
											</div>
										</td>
										<td class="product-subtotal-">
											<span class="amount-" id="subTotal_{{ $cart->id }}">₦{{ $cart->amount }}</span>
										</td>
									</tr>
								@endforeach
								<track>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td></td>
									<td class="float-right">
										<button class="btn float-right" type="submit">Update</button>
									</td>
								</track>
							</form>
						</tbody>
					</table>

					<div class="cart-action mb-6">
						<a href="{{route('product-grids')}}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
						@if (Helper::totalCartPrice() > 0)
						<a href="{{route('clear-cart')}}" class="btn btn-rounded btn-default btn-clear" name="clear_cart" value="Clear Cart">Clear Cart</a> 
						{{-- <button type="submit" class="btn btn-rounded btn-update disabled" name="update_cart" value="Update Cart">Update Cart</button> --}}
						@endif
					</div>

					<form action="{{route('coupon-store')}}" class="coupon" method="POST">
						@csrf
						<h5 class="title coupon-title font-weight-bold text-uppercase">Coupon Discount</h5>
						<input type="text" name="code" class="form-control mb-4" placeholder="Enter coupon code here..." required />
						<button class="btn btn-dark btn-outline btn-rounded">Apply Coupon</button>
					</form>
				</div>
				<div class="col-lg-4 sticky-sidebar-wrapper">
					<div class="sticky-sidebar">
						<div class="cart-summary mb-4">
							<h3 class="cart-title text-uppercase">Cart Totals</h3>
							<div class="cart-subtotal d-flex align-items-center justify-content-between">
								<label class="ls-25">Subtotal</label>
								<span id="mainSubTotal">₦{{number_format(Helper::totalCartPrice(),2)}}</span>
							</div>

							<hr class="divider">


							@if(session()->has('coupon'))
								<li class="coupon_price" data-price="{{Session::get('coupon')['value']}}">You Save<span>₦{{number_format(Session::get('coupon')['value'],2)}}</span></li>
							@endif
							@php
								$total_amount=Helper::totalCartPrice();
								if(session()->has('coupon')){
									$total_amount=$total_amount-Session::get('coupon')['value'];
								}
							@endphp
							<div class="cart-subtotal d-flex align-items-center justify-content-between">
							@if(session()->has('coupon'))
							<label class="ls-25">You pay</label>
							<span id="mainSubTotal">₦{{number_format($total_amount,2)}}</span>
							@else
							<label class="ls-25">You pay</label>
							<span id="mainSubTotal">₦{{number_format($total_amount,2)}}</span>
							@endif
							</div>

							<hr class="divider">		

							<form action="">
								<ul class="shipping-methods mb-2">
									<li>
										<label class="shipping-title text-dark font-weight-bold">Shipping</label>
									</li>
									{{-- @php
										$shipping=DB::table('shippings')->where('status','active')->get();

									@endphp --}}

									{{-- @forelse ($shipping as $ship)
									<div class="custom-radio">
										<input type="radio" id="free-shipping" class="custom-control-input"
											name="shipping">
										<label for="free-shipping"
											class="custom-control-label color-dark">{{$ship->title}}: ₦{{number_format($ship->price,2)}}</label>
									</div>
									@empty
									<label for="free-shipping" class="custom-control-label color-dark">Door Delivery: N1000.00</label>
									@endforelse --}}
									
									<li>
										<div class="custom-radio">
											<input type="radio" onchange="checkPay()" id="free-shipping" class="custom-control-input"
												name="shipping">
											<label for="free-shipping"
												class="custom-control-label color-dark">Door Delivery: N1000.00</label>
										</div>
									</li>
									<li>
										<div class="custom-radio">
											<input type="radio" id="local-pickup" onchange="freeDelivery()" class="custom-control-input"
												name="shipping">
											<label for="local-pickup" class="custom-control-label color-dark">Pick-up Station</label>
										</div>
									</li>
								</ul>
	
								<div class="shipping-calculator">
									<form class="shipping-calculator-form">
										<div class="form-group">
											<div class="select-box">
												<select name="country" class="form-control form-control-md">
													<option value="default" selected="selected">Select State
													</option>
													<option value="abj">Abuja</option>
													<option value="lag">Lagos</option>
													<option value="nas">Nasarawa</option>
												</select>
											</div>
										</div>
										<div class="form-group">
											<input class="form-control form-control-md" type="text"
												name="town-city" placeholder="Town / City">
										</div>
										<div class="form-group">
											<input class="form-control form-control-md" type="text"
												name="zipcode" placeholder="ZIP">
										</div>
										<button type="submit" class="btn btn-dark btn-outline btn-rounded">Update
											Totals</button>
									</form>
								</div>
							</form>
							<hr class="divider mb-6">
							<div class="cart-subtotal d-flex align-items-center justify-content-between" style="color: rede">
								<label class="ls-25">Total</label>
								<span id="mainTotal">₦{{number_format(Helper::totalCartPrice(),2)}}</span>
							</div>
							<a href="{{route('checkout')}}"
								class="btn btn-block btn-dark btn-icon-right btn-rounded  btn-checkout">
								Proceed to checkout<i class="w-icon-long-arrow-right"></i></a>
							
						</div>
					</div>
				</div>
				@else
				<p class="text-center">
					There are no any carts available.<br>
					<a href="{{route('product-grids')}}" class="btn btn-dark btn-rounded btn-icon-left btn-shopping mr-auto"><i class="w-icon-long-arrow-left"></i>Continue Shopping</a>
				</p>
					 {{-- <a href="{{route('product-grids')}}" style="color:blue;">Continue shopping</a> --}}
				@endif
			</div>
		</div>
	</div>
	<!-- End of PageContent -->
@endsection
@section('scripts')
	<script src="{{asset('frontend/js/nice-select/js/jquery.nice-select.min.js')}}"></script>
	<script src="{{ asset('frontend/js/select2/js/select2.min.js') }}"></script>
	<script>
		$(document).ready(function() { $("select.select2").select2(); });
  		$('select.nice-select').niceSelect();
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

		function clearItem(url) {
				window.location.href=url;
			}

	</script>

<script type="text/javascript">

function onInputCount(cartId, price) {
        var quantity = $("#quantity_" + cartId).val();
		// console.log(price);
        uc(cartId, quantity, parseInt(price));
    }

    function ix(cartId) {
        // var quantityInput = $("#quantity_" + cartId);
        // var quantity = parseInt(quantityInput.val());
		// quantityInput.val(quantity + 1);
		// // console.log(quantityInput);
        // var subtotalInput = $("#subTotal_" + cartId);
        // var subtotal = parseInt(subtotalInput.val());

		var x = document.getElementById("subTotal_" + cartId);
        console.log(x.value);
        // uc(cartId, quantity + 1, subtotal);
    }

    function dx(cartId) {
        // var quantityInput = $("#quantity_" + cartId);
        // var quantity = parseInt(quantityInput.val());
        // if (quantity > 1) {
        //     quantityInput.val(quantity - 1);

		// 	var subtotalInput = $("#subTotal_" + cartId);
		// 	var subtotal = parseInt(subtotalInput.val());
			
		// 	uc(cartId, quantity - 1, subtotal);
    

        //     // uc(cartId, quantity - 1);
        // }
    }

	function uc(cartId, quantity, price) {
		// var quantity = parseInt($('#quantity').val());
        // var price = parseFloat(" $cart['price'] }}");
        var subtotal = quantity * price;
		console.log(quantity, price);
        // Display the updated subtotal
        // $('#subTotal').text('₦' + subtotal.toFixed(2));
		$("#subTotal_" + cartId).text('₦' + subtotal.toFixed(2));

        // Make an AJAX request to update the cart item
        // $.ajax({
        //     url: '', // Replace with your update cart route
        //     method: "POST",
        //     data: { cartId: cartId, quantity: quantity },
        //     success: function(response) {
        //         // Update the subtotal and any other relevant data on the page
        //         $("#subTotal_" + cartId).text(response.subtotal);
        //     },
        //     error: function(error) {
        //         console.log(error);
        //     }
        // });
    }
</script>

@endsection
