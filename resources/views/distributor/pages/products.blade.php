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
                    @if ($errors = session('errors'))
                        <div class="alert alert-danger" role="alert">
                            <ul>
                                @foreach ($errors as $error)
                                    <li>{{ $error[0] }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('distributor.products.make-order') }}" method="post" id="makeOrder">
                        @csrf
                        <div class="dashboard_product_list account_user_deails">
                            <div class="row d-block d-sm-flex justify-content-center justify-content-sm-between">
                                <div class="col-sm-6 col-lg-3">
                                    <div class="dashboard_page header_search_widget mb30 mb15-520">
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

                                <div class="col-sm-6 col-lg-3">
                                    <div class="dashboard_page sidebar_location_filter mb30 mb5-520">
                                        <div class="form-group">
                                            <div class="checkout_country_form actegory">
                                                <select class="selectpicker show-tick" name="quantity" required>
                                                    <option value="">Select Product Quantity</option>
                                                    <option value="50">120Pcs Baby Wiper Pack Size - 50 Pieces</option>
                                                    <option value="100">80Pcs Baby Wiper Pack Size - 100 Peices</option>
                                                    <option value="200">60Pcs Baby Wiper Pack Size - 200 Pieces</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-lg-3">
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
                                <div class="col-sm-6 col-lg-3">
                                    <div class="dashboard_page_add_listing text-center text-lg-end mb30 mb15-520 d-grid">
                                        <a href="#" class="btn btn-new btn-lg btn-thm">Your Product Page</a>
                                    </div>
                                </div>
                            </div>
                            <div class="order_table table-responsive">
                                <table class="table">
                                    <thead class="table-light">
                                        <tr>
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
                                        {{-- <input type="text" name="productId"
                                                        id="productId_{{ $product->id }}" value="" /> --}}
                                            <tr>
                                                <th scope="row">#00{{ $product->id }}</th>
                                                <td>{{ $product->title }}</td>
                                                <td class="status"><span class="style4">Bulk</span></td>
                                                <td>{{ $product->dis_price }}</td>
                                                <td>{{ $product->cat_info['title'] }}</td>
                                                <td class="action">
                                                    <span>{{ Carbon\Carbon::parse($product->created_at)->format('M d, Y') }}</span>
                                                </td>
                                                <td class="editing_list align-middle">
                                                    
                                                    <ul>
                                                        <li class="list-inline-item mb-1">
                                                            <a href="#" data-product-id="{{ $product->id }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"
                                                                title="Make order" data-bs-original-title="View"
                                                                aria-label="View">
                                                                <span>Buy</span>
                                                            </a>
                                                        </li>
                                                    </ul>
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
@endsection
@section('scripts')
    {{-- <script src="{{ asset('frontend/assets/vendor/jquery/jquery.min.js') }}"></script> --}}
    <script>
        $(document).ready(function() {

            function setProductId(productId, event) {
                event.preventDefault(); // Prevent default behavior of the link
                $(this).find('span').text('Processing');
                $('#makeOrder').find('input[name="productId"]').remove();
                $('#makeOrder').append('<input name="productId" type="hidden" value="'+productId+'">');
                $('#makeOrder').submit();
            }

            $('a[aria-label="View"]').click(function(event) {
                var productId = $(this).data('product-id');
                setProductId(productId, event);
            });

        });
    </script>
@endsection
