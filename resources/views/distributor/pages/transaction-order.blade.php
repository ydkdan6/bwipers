@extends('distributor.layouts.master')

@section('content')
<div class="dashboard__main pl0-md">
    <div class="dashboard__content bgc-gmart-gray">
        <div class="row pb50">
            <div class="col-lg-12">
                <div class="dashboard_title_area">
                    <h2>Transaction Orders</h2>
                    <p class="para">Personal Transaction Order History.</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6 col-lg-4">
                <div class="dashboard_page sidebar_location_filter mb30 mb5-520">
                    <div class="form-group">
                        <div class="checkout_country_form">
                            <form action="" method="post">
                                <select class="selectpicker show-tick" name="filter">
                                    <option>Status</option>
                                    <option value="Delivered">Delivered</option>
                                    <option value="Cancel">Cancel</option>
                                    <option value="InProgress">In Progress</option>
                                </select>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="dashboard_page_add_listing text-center text-lg-end mb30 mb15-520">
                    <a href="{{route('distributor.products')}}" class="btn btn-order btn-lg btn-thm">New Order</a>
                </div>
            </div>
        </div>
        @if (count($transactions) > 0)
        <div class="order_table table-responsive">
            <table class="table">
                <thead class="table-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col"></th>
                        <th scope="col">Date</th>
                        <th scope="col">Payment</th>
                        <th scope="col">Status</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($transactions as $i => $item)
                    @php
                        // dd($item);
                    @endphp
                    <tr>
                        <th scope="row">#00{{++$i}}</th>
                        <td></td>
                        {{-- <td>{{$item->product->title}}</td> --}}
                        <td></td>
                        <td class="action"><span>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</span></td>
                        <td>Paid</td>
                        <td class="status"><span class="style1">Delivered</span></td>
                        <td>N{{number_format($item->amount)}}</td>
                        <td class="editing_list align-middle">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @else
        <p class="para text-center">Your Personal Credit History.</p>
        @endif
    </div>
    @include('distributor.layouts.footer')
</div>
    {{-- <div class="dashboard_content_wrapper">
        <div class="dashboard dashboard_wrapper pr-30 pr0-md">
            <div class="dashboard__sidebar">
                <div class="dashboard_sidebar_list">
                    <div class="sidebar_list_item">
                        <a href="distributor-dashboard.html" class="items-center -is-active"><i
                                class="flaticon-house mr15"></i>Dashboard</a>
                    </div>
                    <div class="sidebar_list_item ">
                        <a href="bulk-product-page.html" class="items-center"><i
                                class="flaticon-cash-on-delivery mr15"></i>Products</a>
                    </div>
                    <div class="sidebar_list_item ">
                        <a href="distributor-dashboard-order.html" class="items-center"><i
                                class="flaticon-checked-box mr15"></i>Transaction Order</a>
                    </div>
                    <div class="sidebar_list_item ">
                        <a href="distributor-credit-page.html" class="items-center"><i
                                class="flaticon-growth mr15"></i>Credit History</a>
                    </div>
                    <div class="sidebar_list_item ">
                        <a href="distributor-message.html" class="items-center"><i
                                class="flaticon-mail-inbox-app mr15"></i>Message</a>
                    </div>
                    <div class="sidebar_list_item ">
                        <a href="distributor-setting.html" class="items-center"><i
                                class="flaticon-settings mr15"></i>Settings</a>
                    </div>
                    <div class="sidebar_list_item ">
                        <a href="distributor-login.html" class="items-center"><i class="flaticon-exit mr15"></i>Logout</a>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div> --}}
@endsection
