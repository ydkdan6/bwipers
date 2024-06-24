@extends('distributor.layouts.master')

@section('content')
    <div class="dashboard__main pl0-md">
        <div class="dashboard__content bgc-gmart-gray">
            <div class="row pb50">
                <div class="col-lg-12">
                    <div class="dashboard_title_area">
                        <h2>Products</h2>
                        <p class="para">Your Personalized Product Page.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                   @include('distributor.layouts.alert')

                    <form action="{{ route('distributor.products.make-order') }}" method="post" id="orderForm">
                        @csrf
                        <div class="dashboard_product_list account_user_deails">
                            <div class="row d-block d-sm-flex justify-content-center justify-content-sm-between">
                                <div class="col-sm-6 col-lg-4">
                                    <div class="dashboard_page header_search_widget mb30  mb15-520">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search product"
                                                aria-label="Recipient's username">
                                            <div class="input-group-append">
                                                <button class="btn" type="button"><span
                                                        class="fa fa-search"></span></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-6 col-lg-4">
                                    <div class="dashboard_page sidebar_location_filter mb30 mb5-520">
                                        <div class="form-group">
                                            <div class="checkout_country_form">
                                                <select class="selectpicker show-tick" name="payment_type" required>
                                                    <option value="">Payment Type</option>
                                                    <option value="Credit" selected>Credit</option>
                                                    <option value="No Credit">No Credit</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 col-lg-4">
                                    <div class="dashboard_page_add_listing text-center text-lg-end mb30 mb15-520 d-grid">
                                        <button type="button" id="makeOrder"
                                            class="btn btn-new btn-lg btn-thm">Buy</button>
                                    </div>
                                </div>
                            </div>
                            <div class="order_table table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col"></th>
                                            <th scope="col">ID</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Categories</th>
                                            <th scope="col">Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $i => $product)
                                            <tr>
                                                <td><input type="checkbox" name="productId"
                                                        id="productId_{{ $product->id }}" value="{{ $product->id }}"></td>
                                                <th scope="row">#{{ $product->id }}</th>
                                                <td>{{ $product->title }}</td>
                                                <td class="status"><span class="style4">{{ $product->stock }}</span></td>
                                                <td>{{ $product->dis_price }}</td>
                                                <td>{{ $product->cat_info['title'] }}</td>
                                                <td class="action">
                                                    <span>{{ Carbon\Carbon::parse($product->created_at)->format('M d, Y') }}</span>
                                                </td>
                                                <td class="editing_list align-middle">

                                                    <input type="number" data-product-id="{{ $product->id }}"
                                                        class="form-control" placeholder="Quantity" name=""
                                                        min="50" id="" required>

                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal to display selected products -->
    <div id="orderModal" class="modal fade" role="dialog">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="content">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Order Details</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Display selected products -->
                    <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Selected Products</h4>
                    {{-- <ul id="selected-products"> --}}
                    <!-- Add selected products dynamically here -->
                    <div id="selectedProducts"></div>
                    {{-- </ul> --}}

                    <!-- Display total price of selected products -->
                    <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Total Price</h4>
                    <p id="total-price"></p>

                    <!-- Shipping details -->
                    <h4 class="title title-simple bb-no mb-1 pb-0 pt-3">Shipping</h4>
                    <ul id="shipping-details" class="mb-4">
                        <li>
                            @if (count(Helper::shipping()) > 0)
                                <select name="shipping" id="shipping-option" class="form-control">
                                    <option value="">Select your destination</option>
                                    @foreach (Helper::shipping() as $shipping)
                                        <option value="{{ $shipping->id }}" class="shippingOption"
                                            data-price="{{ $shipping->price }}">
                                            {{ $shipping->type }}: ₦{{ $shipping->price }}
                                        </option>
                                    @endforeach
                                </select>
                            @else
                                <span class="ml-3">Free</span>
                            @endif
                        </li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <!-- Submit button to send data to endpoint -->
                    <button type="submit" class="btn btn-primary" id="submitOrder">Place Order</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('scripts')
    {{-- <script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script> --}}
    <script>
        $(document).ready(function() {

            let myProducts = [];

            function calculateTotalPrice(myProducts, shippingPrice = 0) {
                // console.log(shippingPrice);
                let totalPrice = 0;
                myProducts.forEach(function(product) {
                    // Parse quantity and price to integers
                    let quantity = parseInt(product.quantity);
                    let price = parseFloat(product.price);
                    // Calculate subtotal for each product
                    let subtotal = quantity * price;
                    // Add subtotal to total price
                    totalPrice += subtotal;
                });

                totalPrice += shippingPrice;
                // // Display total price
                $('#total-price').text('Total Price: ₦' + totalPrice.toFixed(2));
            }

            $('#makeOrder').click(function(event) {
                event.preventDefault();

                // Check if any quantity field is empty or less than 20
                var isValid = true;
                $('input[name="productId"]:checked').each(function() {
                    var productQuantity = parseInt($(this).closest('tr').find(
                        'input[type="number"]').val());
                    if (!productQuantity || productQuantity < 20) {
                        isValid = false;
                        return false; // Exit the loop if an invalid quantity is found
                    }
                });

                if (!isValid) {
                    alert('Please enter a quantity of at least 20 for each selected product.');
                    return;
                }


                // Get selected products and their details
                let selectedProducts = [];
                // let myProducts = [];
                $('input[name="productId"]:checked').each(function() {
                    let productId = $(this).val();
                    let productName = $(this).closest('tr').find('td:nth-child(3)').text();
                    let productPrice = $(this).closest('tr').find('td:nth-child(5)').text();
                    let productQuantity = $(this).closest('tr').find('input[type="number"]').val();
                    selectedProducts.push({
                        id: productId,
                        name: productName,
                        price: productPrice,
                        quantity: productQuantity
                    });
                });

                myProducts = selectedProducts;


                // Add hidden input fields for each selected product
                let form = $('#orderForm');
                form.find('input[name="selectedProducts"]').remove(); // Remove existing hidden fields
                $.each(selectedProducts, function(index, product) {
                    form.append('<input type="hidden" name="selectedProducts[' + index +
                        '][id]" value="' + product.id + '">');
                    form.append('<input type="hidden" name="selectedProducts[' + index +
                        '][name]" value="' + product.name + '">');
                    form.append('<input type="hidden" name="selectedProducts[' + index +
                        '][price]" value="' + product.price + '">');
                    form.append('<input type="hidden" name="selectedProducts[' + index +
                        '][quantity]" value="' + product.quantity + '">');
                });


                // Display selected products in modal
                let modalBody = $('#selectedProducts');
                modalBody.empty();
                if (selectedProducts.length > 0) {
                    $.each(selectedProducts, function(index, product) {
                        let total = product.quantity * product.price;
                        modalBody.append('<p><strong>Name:</strong> <span class="">' + product
                            .name + '</span></p>');
                        modalBody.append('<p><strong>Price:</strong> <span class="product-price">' +
                            product.price + '</span></p>');
                        modalBody.append(
                            '<p><strong>Quantity:</strong> <span class="product-quantity">' +
                            product.quantity +
                            '</span></p>');
                        modalBody.append('<p><strong>Total:</strong> NGN<span class="">' + total +
                            '</span></p>');
                        modalBody.append('<hr>');
                    });
                    $('#orderModal').modal('show');
                    calculateTotalPrice(myProducts);
                } else {
                    alert('Please select at least one product.');
                }
            });



            // Function to update total price when shipping option changes
            $('#shipping-option').on('change', function() {
                let id = $('#shipping-option').val();

                if (id != '') {
                    var price = $('.shippingOption').attr('data-price');
                    $('#orderForm').append('<input type="hidden" name="shippingId" value="' + id + '">');
                    calculateTotalPrice(myProducts, parseFloat(price));
                } else {
                    $('#orderForm').find('input[name="shippingId"]').remove();
                    calculateTotalPrice(myProducts, parseFloat(0));
                }

            });

            // Submit order when submit button in modal is clicked
            $('#submitOrder').click(function() {
                $('#orderForm').submit();
            });

        });
    </script>
@endsection
