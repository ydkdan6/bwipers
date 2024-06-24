@extends('distributor.layouts.master')

@section('content')
    <div class="dashboard__main pl0-md">
        <div class="dashboard__content bgc-gmart-gray">
            <div class="row pb50">
                <div class="col-lg-12">
                    <div class="dashboard_title_area">
                        <h2>Referrals</h2>
                        <p class="para">Your Referrals.</p>
                    </div>
                </div>
                <div class="col-lg-12 d-flex justify-content-end">
                    <div class="dashboard_title_area">

                        <p class="para d-inline">Total Referrals:
                        <h5 class="d-inline">{{ number_format(count($referrals)) }}</h5>
                        </p>
                    </div>
                </div>
            </div>
            @include('distributor.layouts.alert')
            <div class="row">
                @if (count($referrals) > 0)
                    <div class="order_table table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Total orders</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Joined</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($referrals->take(20) as $i => $item)
                                    <tr>
                                        <th scope="row">#{{ ++$i }}</th>
                                        <td>
                                            {{ $item->name }}
                                        </td>
                                        <td>{{ number_format($item->orders->count()) }}</td>
                                        <td>{{ '' }}</td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <p class="para text-center">No referrals yet.</p>
                @endif
            </div>
        </div>
        @include('distributor.layouts.footer')
    </div>
@endsection
