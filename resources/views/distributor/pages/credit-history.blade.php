@extends('distributor.layouts.master')

@section('content')
    <div class="dashboard__main pl0-md">
        <div class="dashboard__content bgc-gmart-gray">
            <div class="row pb50">
                <div class="col-lg-12">
                    <div class="dashboard_title_area">
                        <h2>Credit History</h2>
                        <p class="para">Your Personal Credit History.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if (count($creditHistories) > 0)
                    <div class="order_table table-responsive">
                        <table class="table">
                            <thead class="table-light">
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col"></th>
                                    <th scope="col"></th>
                                    <th scope="col">Date</th>
                                    <th scope="col">Balances</th>
                                    <th scope="col">Total Bulk Orders</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($creditHistories->take(15) as $i => $item)
                                    <tr>
                                        <th scope="row">#00{{ ++$i }}</th>
                                        <td>
                                            <div class="d-flex customer_info">
                                                <div class="flex-grow-1 ms-3">
                                                    <h5 class="mb0">{{ $item->product->title }}</h5>
                                                </div>
                                            </div>
                                        </td>
                                        <td></td>
                                        <td></td>
                                        <td>{{ Carbon\Carbon::parse($item->created_at)->format('M d, Y') }}</td>
                                        <td>N{{ number_format($item->amount) }}</td>
                                        <td>{{ $item->quantity }}</td>
                                        <td>{{ $item->status == 'paid' ? 'Paid' : 'Not paid' }}</td>
                                        <td class="editing_list align-middle">
                                            @if ($item->status != 'paid')
                                                <form action="" method="post" class="d-none">
                                                    @csrf
                                                    <input type="hidden" name="cId" value="{{ $item->id }}">
                                                    <input type="hidden" name="cAmnt" value="{{ $item->amount }}">
                                                </form>
                                            @endif
                                            <ul>
                                                @if ($item->status == 'paid')
                                                    ----
                                                @else
                                                    <li class="list-inline-item mb-1">
                                                        <a href="{{ route('credit-pay', $item->id) }}"
                                                            data-bs-toggle="tooltip" data-bs-placement="top" title="Pay"
                                                            data-bs-original-title="View"
                                                            aria-label="View"><span>Pay</span></a>
                                                    </li>
                                                @endif
                                            </ul>
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
        </div>
        @include('distributor.layouts.footer')
    </div>
@endsection
