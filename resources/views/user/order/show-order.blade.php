@extends('frontend.layouts.shop')

@section('main-content')
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of PageContent -->
    <div class="page-content pt-2">
        <div class="container">
            <div class="tab tab-vertical row gutter-lg d-flex justify-content-center">
                {{-- <ul class="nav nav-tabs mb-6" role="tablist">
                    <li class="nav-item">
                        <a href="#account-dashboard" class="nav-link active">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-orders" class="nav-link">My Orders</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-downloads" class="nav-link">Cherix Products</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-addresses" class="nav-link">Addresses</a>
                    </li>
                    <li class="nav-item">
                        <a href="#account-details" class="nav-link">Account details</a>
                    </li>
                    <li class="link-item">
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                        <a href=""
                            onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>
                    </li>
                </ul> --}}

                <div class="tab-content mb-6">
                    <div class="card">
                        <div class="b-flex justify-content-between">
                            <h5 class="card-header">Order
                            </h5>
                            <div>
                                <a href="{{ route('order.pdf', $order->id) }}"
                                    class=" btn btn-sm btn-primary shadow-sm floatright"><i
                                        class="fas fa-download fa-sm text-white-50"></i> Generate PDF</a>
                            </div>
                        </div>
                        <div class="card-body">
                            @if ($order)
                                <table class="table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Order No.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Quantity</th>
                                            <th>Charge</th>
                                            <th>Total Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->order_number }}</td>
                                            <td>{{ $order->first_name }} {{ $order->last_name }}</td>
                                            <td>{{ $order->email }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>NGN{{ $order->shipping?->price }}</td>
                                            <td>NGN{{ number_format($order->total_amount, 2) }}</td>
                                            <td>
                                                @if ($order->status == 'new')
                                                    <span class="badge badge-primary">{{ $order->status }}</span>
                                                @elseif($order->status == 'process')
                                                    <span class="badge badge-warning">{{ $order->status }}</span>
                                                @elseif($order->status == 'delivered')
                                                    <span class="badge badge-success">{{ $order->status }}</span>
                                                @else
                                                    <span class="badge badge-danger">{{ $order->status }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <form method="POST" action="{{ route('order.destroy', [$order->id]) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-sm dltBtn"
                                                        data-id={{ $order->id }}
                                                        style="height:30px; width:30px;border-radius:50%"
                                                        data-toggle="tooltip" data-placement="bottom" title="Delete"><i
                                                            class="fas fa-trash-alt"></i></button>
                                                </form>
                                            </td>

                                        </tr>
                                    </tbody>
                                </table>

                                <section class="confirmation_part section_padding">
                                    <div class="order_boxes">
                                        <div class="row">
                                            <div class="col-lg-6 col-lx-4">
                                                <div class="order-info">
                                                    <h4 class="text-center pb-4">ORDER INFORMATION</h4>
                                                    <table class="table">
                                                        <tr class="">
                                                            <td>Order Number</td>
                                                            <td> : {{ $order->order_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Order Date</td>
                                                            <td> : {{ $order->created_at->format('D d M, Y') }} at
                                                                {{ $order->created_at->format('g : i a') }} </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Quantity</td>
                                                            <td> : {{ $order->quantity }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Order Status</td>
                                                            <td> : {{ $order->status }}</td>
                                                        </tr>
                                                        <tr>
                                                            @php
                                                                $shipping_charge = DB::table('shippings')
                                                                    ->where('id', $order->shipping_id)
                                                                    ->pluck('price');
                                                            @endphp
                                                            <td>Shipping Charge</td>
                                                            <td> :NGN{{ $order->shipping?->price }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Total Amount</td>
                                                            <td> : NGN{{ number_format($order->total_amount, 2) }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Payment Method</td>
                                                            <td> : @if ($order->payment_method == 'cod')
                                                                    Cash on Delivery
                                                                @else
                                                                    Paystack
                                                                @endif
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Payment Status</td>
                                                            <td> : {{ $order->payment_status }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>

                                            <div class="col-lg-6 col-lx-4">
                                                <div class="shipping-info">
                                                    <h4 class="text-center pb-4">SHIPPING INFORMATION</h4>
                                                    <table class="table">
                                                        <tr class="">
                                                            <td>Full Name</td>
                                                            <td> : {{ $order->first_name }} {{ $order->last_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Email</td>
                                                            <td> : {{ $order->email }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Phone No.</td>
                                                            <td> : {{ $order->phone }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Address</td>
                                                            <td> : {{ $order->address1 }}, {{ $order->address2 }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Country</td>
                                                            <td> : {{ $order->country }}</td>
                                                        </tr>
                                                        <tr>
                                                            <td>Post Code</td>
                                                            <td> : {{ $order->post_code }}</td>
                                                        </tr>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of PageContent -->
@endsection
