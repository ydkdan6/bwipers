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
          <li><a href="{{route('home')}}">Home</a></li>
          <li>My account</li>
      </ul>
  </div>
</nav>
<!-- End of Breadcrumb -->

<!-- Start of PageContent -->
<div class="page-content pt-2">
  <div class="container">
      <div class="tab tab-vertical row gutter-lg">
          <ul class="nav nav-tabs mb-6" role="tablist">
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
                  <a href=""  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">Logout</a>
              </li>
          </ul>

          <div class="tab-content mb-6">
              <div class="tab-pane active in" id="account-dashboard">
                
                  <p class="greeting">
                      Hello
                      <span class="text-dark font-weight-bold">{{Auth()->user()->name}}</span>
                      (not
                      <span class="text-dark font-weight-bold">{{Auth()->user()->name}}</span>?
                      <a href="" class="text-primary" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">Log out</a>)
                  </p>

                  <p class="mb-4">
                      From your account dashboard you can view your <a href="#account-orders"
                          class="text-primary link-to-tab">recent orders</a>,
                      manage your <a href="#account-addresses" class="text-primary link-to-tab">shipping
                          and billing
                          addresses</a>, and
                      <a href="#account-details" class="text-primary link-to-tab">edit your password and
                          account details.</a>
                  </p>

                  <div class="row">
                      <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                          <a href="#account-orders" class="link-to-tab">
                              <div class="icon-box text-center">
                                  <span class="icon-box-icon icon-orders">
                                      <i class="w-icon-orders"></i>
                                  </span>
                                  <div class="icon-box-content">
                                      <p class="text-uppercase mb-0">My Orders</p>
                                  </div>
                              </div>
                          </a>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                          <a href="#account-downloads" class="link-to-tab">
                              <div class="icon-box text-center">
                                  <span class="icon-box-icon icon-download">
                                      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-bag-dash" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M5.5 10a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1H6a.5.5 0 0 1-.5-.5"/>
                                          <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                                        </svg>                                                </span>
                                  <div class="icon-box-content">
                                      <p class="text-uppercase mb-0">CheriX Products</p>
                                  </div>
                              </div>
                          </a>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                          <a href="#account-addresses" class="link-to-tab">
                              <div class="icon-box text-center">
                                  <span class="icon-box-icon icon-address">
                                      <i class="w-icon-map-marker"></i>
                                  </span>
                                  <div class="icon-box-content">
                                      <p class="text-uppercase mb-0">Addresses</p>
                                  </div>
                              </div>
                          </a>
                      </div>
                      <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                          <a href="#account-details" class="link-to-tab">
                              <div class="icon-box text-center">
                                  <span class="icon-box-icon icon-account">
                                      <i class="w-icon-user"></i>
                                  </span>
                                  <div class="icon-box-content">
                                      <p class="text-uppercase mb-0">Account Details</p>
                                  </div>
                              </div>
                          </a>
                      </div><!--
                      <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                          <a href="wishlist.html" class="link-to-tab">
                              <div class="icon-box text-center">
                                  <span class="icon-box-icon icon-wishlist">
                                      <i class="w-icon-heart"></i>
                                  </span>
                                  <div class="icon-box-content">
                                      <p class="text-uppercase mb-0">Wishlist</p>
                                  </div>
                              </div>
                          </a>
                      </div>-->
                      <div class="col-lg-4 col-md-6 col-sm-4 col-xs-6 mb-4">
                          <a href="" onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
                              <div class="icon-box text-center">
                                  <span class="icon-box-icon icon-logout">
                                      <i class="w-icon-logout"></i>
                                  </span>
                                  <div class="icon-box-content">
                                      <p class="text-uppercase mb-0">Logout</p>
                                  </div>
                              </div>
                          </a>
                      </div>
                  </div>
              </div>

              <div class="tab-pane mb-4" id="account-orders">
                  <div class="icon-box icon-box-side icon-box-light">
                      <span class="icon-box-icon icon-orders">
                          <i class="w-icon-orders"></i>
                      </span>
                      <div class="icon-box-content">
                          <h4 class="icon-box-title text-capitalize ls-normal mb-0">My Orders</h4>
                      </div>
                  </div>
                  @php
                  $orders=DB::table('orders')->where('user_id',auth()->user()->id)->paginate(10);
              @endphp
                  <table class="shop-table account-orders-table mb-6">
                      <thead>
                          <tr style="text-align: left;">
                              <th class="order-id">Order</th>
                              <th class="order-date">Date</th>
                              <th class="order-status">Status</th>
                              <th class="order-total">Total</th>
                              <th class="order-actions">Actions</th>
                          </tr>
                      </thead>
                      <tbody>
                        @if(count($orders)>0)
                        @foreach($orders as $order)   
                          <tr>
                              {{-- <td>{{$order->id}}</td> --}}
                              <td class="order-id">#{{$order->order_number}}</td>
                              {{-- <td>{{$order->first_name}} {{$order->last_name}}</td> --}}
                              <td class="order-date">{{$order->created_at}}</td>
                              <td  class="order-status">
                                  @if($order->status=='new')
                                    <span class="badge badge-primary">{{$order->status}}</span>
                                  @elseif($order->status=='process')
                                    <span class="badge badge-warning">{{$order->status}}</span>
                                  @elseif($order->status=='delivered')
                                    <span class="badge badge-success">{{$order->status}}</span>
                                  @else
                                    <span class="badge badge-danger">{{$order->status}}</span>
                                  @endif
                              </td>
                              <td class="order-total">
                                <span class="order-price">₦{{number_format($order->total_amount,2)}}</span> for
                                <span class="order-quantity"> {{$order->quantity}}</span> item
                            </td>
                              
                              <td class="order-action">
                                  <a href="{{route('user.order.show',$order->id)}}" class="btn btn-outline-warning btn-warning btn-block btn-sm btn-rounded mr-1" data-toggle="tooltip" title="view" data-placement="bottom"><i class="fas fa-eye"></i></a>
                                  <div></div>
                                  {{-- <form method="POST" action="{{route('user.order.delete',[$order->id])}}">
                                    @csrf 
                                    @method('delete')
                                        <button class="btn btn-outline btn-default btn-block btn-sm btn-rounded" data-id={{$order->id}} data-toggle="tooltip" data-placement="bottom" title="Delete"><i class="fas fa-trash-alt"></i></button>
                                  </form> --}}
                              </td>
                          </tr>  
                        @endforeach
                        @else
                          <td colspan="8" class="text-center"><h4 class="my-4">You have no order yet!! Please order some products</h4></td>
                        @endif
                      </tbody>
                  </table>

                  <a href="{{route('product-grids')}}" class="btn btn-dark btn-rounded btn-icon-right">Go
                      Shop<i class="w-icon-long-arrow-right"></i></a>
              </div>

              <div class="tab-pane" id="account-downloads">
                  <div class="icon-box icon-box-side icon-box-light">
                      <span class="icon-box-icon icon-downloads mr-2">
                          <i class="w-icon-download"></i>
                      </span>
                      <div class="icon-box-content">
                          <h4 class="icon-box-title ls-normal">CheriX Product</h4>
                      </div>
                  </div>
                  <p class="mb-4">Go-To-CheriX Shop.</p>
                  <a href="{{route('product-grids')}}" class="btn btn-dark btn-rounded btn-icon-right">Go
                      Shop<i class="w-icon-long-arrow-right"></i></a>
              </div>

              <div class="tab-pane" id="account-addresses">
                  <div class="icon-box icon-box-side icon-box-light">
                      <span class="icon-box-icon icon-map-marker">
                          <i class="w-icon-map-marker"></i>
                      </span>
                      <div class="icon-box-content">
                          <h4 class="icon-box-title mb-0 ls-normal">Addresses</h4>
                      </div>
                  </div>
                  <p>The following addresses will be used on the checkout page
                      by default.</p>
                  <div class="row">
                      <div class="col-sm-6 mb-6">
                          <div class="ecommerce-address billing-address pr-lg-8">
                              <h4 class="title title-underline ls-25 font-weight-bold">Billing Address</h4>
                              <address class="mb-4">
                                  <table class="address-table">
                                      <tbody>
                                          <tr>
                                              <th>Name:</th>
                                              <td>{{Auth()->user()->name}}</td>
                                          </tr>
                                          <tr>
                                              <th>Address:</th>
                                              <td>Karu Abuja, Nigeria</td>
                                          </tr>
                                          <tr>
                                              <th>City:</th>
                                              <td>Abuja</td>
                                          </tr>
                                          <tr>
                                              <th>Country:</th>
                                              <td>Nigeria(NIG)</td>
                                          </tr>
                                          <tr>
                                              <th>Postcode:</th>
                                              <td>90010</td>
                                          </tr>
                                          <tr>
                                              <th>Phone:</th>
                                              <td>07043710895</td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </address>
                              <a href="#"
                                  class="btn btn-link btn-underline btn-icon-right text-primary">Edit
                                  your billing address<i class="w-icon-long-arrow-right"></i></a>
                          </div>
                      </div>
                      <div class="col-sm-6 mb-6">
                          <div class="ecommerce-address shipping-address pr-lg-8">
                              <h4 class="title title-underline ls-25 font-weight-bold">Shipping Address</h4>
                              <address class="mb-4">
                                  <table class="address-table">
                                      <tbody>
                                          <tr>
                                              <th>Name:</th>
                                              <td>{{Auth()->user()->name}}</td>
                                          <tr>
                                              <th>Address:</th>
                                              <td>Abuja</td>
                                          </tr>
                                          <tr>
                                              <th>City:</th>
                                              <td>FCT, Abuja</td>
                                          </tr>
                                          <tr>
                                              <th>Country:</th>
                                              <td>Nigeria (NIG)</td>
                                          </tr>
                                          <tr>
                                              <th>Postcode:</th>
                                              <td>900010</td>
                                          </tr>
                                      </tbody>
                                  </table>
                              </address>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="tab-pane" id="account-details">
                  <div class="icon-box icon-box-side icon-box-light">
                      <span class="icon-box-icon icon-account mr-2">
                          <i class="w-icon-user"></i>
                      </span>
                      <div class="icon-box-content">
                          <h4 class="icon-box-title mb-0 ls-normal">Account Details</h4>
                      </div>
                  </div>
                  @php
                      $profile=Auth()->user();
                  @endphp
                  <form class="form account-details-form" method="POST" action="{{route('user-profile-update',$profile->id)}}">
                    @csrf
                      <div class="row">
                          <div class="col-md-12">
                              <div class="form-group">
                                  <label for="name">Name *</label>
                                  <input type="text" id="name" name="name" placeholder="First-Name"
                                      class="form-control form-control-md" value="{{$profile->name}}">
                                      @error('name')
                                      <span class="text-danger">{{$message}}</span>
                                      @enderror
                              </div>
                          </div>
                          {{-- <div class="col-md-6">
                              <div class="form-group">
                                  <label for="lastname">Last name *</label>
                                  <input type="text" id="lastname" name="lastname" placeholder="Last-Name"
                                      class="form-control form-control-md">
                              </div>
                          </div> --}}
                      </div>

                      <div class="form-group mb-3">
                          <label for="display-name">Display name *</label>
                          <input type="text" id="display-name" name="display_name" value="{{$profile->name}}" placeholder="Your Name"
                              class="form-control form-control-md mb-0">
                          <p>This will be how your name will be displayed in the account section and in reviews</p>
                          @error('name')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>

                      <div class="form-group mb-6">
                          <label for="email">Email address *</label>
                          <input type="email" id="email" name="email"
                              class="form-control form-control-md"  value="{{$profile->email}}">
                              @error('email')
                          <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                    </form>
                    <form class="form account-details-form" method="POST" action="{{ route('change.password') }}">
                      @csrf
                      <h4 class="title title-password ls-25 font-weight-bold">Password change</h4>
                      @foreach ($errors->all() as $error)
                      <p class="text-danger">{{ $error }}</p>
                   @endforeach 
                      <div class="form-group">
                          <label class="text-dark" for="cur-password">Current Password leave blank to leave unchanged</label>
                          <input type="password" class="form-control form-control-md"
                              id="cur-password" name="current_password" autocomplete="current-password">
                      </div>
                      <div class="form-group">
                          <label class="text-dark" for="new-password">New Password leave blank to leave unchanged</label>
                          <input type="password" class="form-control form-control-md"
                              id="new-password"  name="new_password" autocomplete="current-password">
                      </div>
                      <div class="form-group mb-10">
                          <label class="text-dark" for="conf-password">Confirm Password</label>
                          <input type="password" class="form-control form-control-md"
                              id="conf-password"  name="new_confirm_password" autocomplete="current-password">
                      </div>
                      <button type="submit" class="btn btn-dark btn-rounded btn-sm mb-4">Save Changes</button>
                  </form>
              </div>
          </div>
      </div>
  </div>
</div>
<!-- End of PageContent -->
@endsection