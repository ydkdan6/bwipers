@extends('distributor.layouts.master')

@section('content')
    <div class="dashboard__main pl0-md">
        <div class="dashboard__content bgc-gmart-gray">
            <div class="row pb50">
                <div class="col-lg-12">
                    <div class="dashboard_title_area">
                        <h2>Referral Earnings</h2>
                        <p class="para">Your Referral Earnings.</p>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <div class="dashboard_title_area">
                       
                        <p class="para d-inline">Total Earnings:  <h5 class="d-inline">N{{ number_format($earnings->sum('amount'), 2) }}</h5></p>
                    </div>
                </div>
            </div>
            @include('distributor.layouts.alert')
            <div class="row">
                @if (count($earnings) > 0)
                    <div class="order_table table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($earnings->take(20) as $i => $item)
                                    <tr>
                                        <th scope="row">#{{ ++$i }}</th>
                                        <td>
                                            {{ $item->sales_person_name }}
                                        </td>
                                        <td>N{{$item->amount}}</td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="para text-center">No referral earnings yet.</p>
                @endif
            </div>
        </div>
        @include('distributor.layouts.footer')
    </div>
@endsection
