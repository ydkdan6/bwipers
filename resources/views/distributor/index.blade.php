@extends('distributor.layouts.master')

@section('content')
<div class="dashboard__main pl0-md">
    <div class="dashboard__content bgc-gmart-gray">
      <div class="row pb50">
        <div class="col-lg-12">
          <div class="dashboard_title_area">
            <h2>Dashboard</h2>
            <p class="para">Your Personalized dashboard.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-xxl-3">
          <div class="d-flex justify-content-between statistics_funfact">
            <div class="details">
              <div class="subtitle1">Total Orders</div>
              <div class="title">{{ number_format(count($orders)) }} </div>
            </div>
            <div class="icon text-center mt-4"><i class="flaticon-sent"></i></div>
          </div>
        </div>
        <div class="col-lg-6 col-xxl-3">
          <div class="d-flex justify-content-between statistics_funfact">
            <div class="details">
              <div class="subtitle1">My Credit Balance</div>
              <div class="title">N{{ number_format($creditBalance) }} <span class="badge style2 text-center"></span></div>
            </div>
            <div class="icon text-center mt-4"><i class="flaticon-wallet"></i></div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-xl-8">
          <div class="application_statics">
            <h4 class="title pl30 mb30">Recent Orders</h4>
            <div class="account_user_deails dashboard_page">
              @if (count($orders) > 0)
              <div class="order_table table-responsive">
                <table class="table">
                  <thead class="table-light">
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">Product</th>
                      <th scope="col">Date</th>
                      <th scope="col">Payment</th>
                      <th scope="col">Status</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($orders as $key => $order)
                    <tr>
                      <th scope="row">#{{$order->order_number}}</th>
                      <td>Cherix Baby Wipes</td>
                      <td>{{ Carbon\Carbon::parse($order->created_at)->format('M d, Y') }}</td>
                      <td>Credit</td>
                      <td class="status"><span class="style1">{{ $order->status }}</span></td>
                      <td>N{{ number_format($order->total_amount) }} </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              @else
              <p class="para text-center">No orders yet</p>
              @endif
            </div>
          </div>
        </div>
        @include('distributor.layouts.footer')
  </div>
@endsection