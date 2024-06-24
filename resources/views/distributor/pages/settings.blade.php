@extends('distributor.layouts.master')

@section('content')
<div class="dashboard__main pl0-md">
    <div class="dashboard__content bgc-gmart-gray">
      <div class="row pb50">
        <div class="col-lg-12">
          <div class="dashboard_title_area">
            <h2>Settings</h2>
            <p class="para">Your Personalized Setting.</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="dashboard_setting_box">
            <div class="ui_kit_tab style2">
              <!-- nav tab Nav List Start -->
              <ul class="nav nav-tabs mb15" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active" id="editprofile-tab" data-bs-toggle="tab" data-bs-target="#editprofile" type="button" role="tab" aria-controls="editprofile" aria-selected="true">Edit Profile</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="password-tab" data-bs-toggle="tab" data-bs-target="#password" type="button" role="tab" aria-controls="password" aria-selected="false">Password</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="socialprofile-tab" data-bs-toggle="tab" data-bs-target="#socialprofile" type="button" role="tab" aria-controls="socialprofile" aria-selected="false">Social Profiles</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link" id="closeaccount-tab" data-bs-toggle="tab" data-bs-target="#closeaccount" type="button" role="tab" aria-controls="closeaccount" aria-selected="false">Close Account</button>
                </li>
              </ul>
              <!-- nav tab Nav List End -->
              <!-- nav tab contents Start -->
              <div class="tab-content pt20 row" id="myTabContent">
                <div class="tab-pane fade show active col-lg-12" id="editprofile" role="tabpanel" aria-labelledby="editprofile-tab">
                  <div class="account_details_page form_grid">
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach 
                    <form class="contact_form" name="contact_form" action=" {{ route('distributor.distributor-settings-update') }} " method="post" novalidate>
                        @csrf
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group mb-4">
                            <label class="form-label">Distributor Full Name</label>
                            <input class="form-control" type="text" name="name" value="{{ $profile->name }}" placeholder="Your Name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-4">
                            <label class="form-label">Business Name</label>
                            <input class="form-control" type="text"  name="business_name" value="{{ $profile->business_name }}"  placeholder="Your Business Name">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-4">
                            <label class="form-label">Phone Number</label>
                            <input class="form-control" type="number" name="phone" value="{{ $profile->phone }}"  placeholder="Phone Number">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-4">
                            <label class="form-label">Email</label>
                            <input class="form-control email" type="email" name="email" value="{{ $profile->email }}"  placeholder="Your Email">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="dashboard_page sidebar_location_filter">
                            <div class="form-group mb-3">
                              <label class="form-label">Country</label>
                              <div class="checkout_country_form actegory">
                                <select class="selectpicker show-tick" name="country">
                                    <option>Select</option>
                                    @foreach(['Nigeria'] as $option)
                                        <option value="{{ $option }}" {{ $profile->country == $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="dashboard_page sidebar_location_filter">
                            <div class="form-group mb-3">
                              <label class="form-label">State</label>
                              <div class="checkout_country_form actegory">
                                <select class="selectpicker show-tick" name="state">
                                    <option>Select</option>
                                    @foreach(['Abia', 'Adamawa', 'Akwa Ibom', 'Anambra', 'Abuja'] as $option)
                                        <option value="{{ $option }}" {{ $profile->state == $option ? 'selected' : '' }}>
                                            {{ $option }}
                                        </option>
                                    @endforeach
                                </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-4">
                            <label class="form-label">Address Line 1</label>
                            <input class="form-control" type="text" name="address_one" value="{{ $profile->address_one }}"  placeholder="Address Line">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group mb-4">
                            <label class="form-label">Address Line 2</label>
                            <input class="form-control" type="text" name="address_two" value="{{ $profile->address_two }}"  placeholder="Address Line">
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group d-grid d-sm-flex mb0">
                            <button type="submit" class="style2 btn btn-thm me-3 mb15-520">Update Profile</button>
                            <button type="button" class="style2 btn btn-white">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade col-xl-6" id="password" role="tabpanel" aria-labelledby="password-tab">
                  <div class="account_details_page form_grid">
                    @foreach ($errors->all() as $error)
                        <p class="text-danger">{{ $error }}</p>
                    @endforeach 
                    <form class="contact_form" name="contact_form" action="{{route('distributor.change.password')}}" method="post" novalidate>
                        @csrf
                      <div class="row">
                        <div class="col-md-12">
                          <div class="form-group mb-4">
                            <label class="form-label">Current password</label>
                            <input class="form-control" type="text" name="current_password" placeholder="************">
                          </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group mb-4">
                            <label class="form-label">New password</label>
                            <input class="form-control" type="text"  name="new_password" placeholder="************">
                          </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                              <label class="form-label">Confirm password</label>
                              <input class="form-control" type="text"  name="new_confirm_password" placeholder="************">
                            </div>
                          </div>
                        <div class="col-sm-12">
                          <div class="form-group d-grid d-sm-flex mb0">
                            <button type="submit" class="style2 btn btn-thm me-3 mb15-520">Update Password</button>
                            <button type="button" class="style2 btn btn-white">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="tab-pane fade col-xl-8" id="closeaccount" role="tabpanel" aria-labelledby="closeaccount-tab">
                  <div class="account_details_page form_grid">
                    <form class="contact_form" action="{{route('distributor.distributor-settings-close-account')}}" method="post" novalidate>
                      @csrf
                      <div class="row">
                        <div class="col-md-10">
                          <h5>Close account</h5>
                          <p class="fz15 heading-color">Warning: If you close your account, you will be unsubscribed from all your personal Transaction, and will lose access forever.</p>
                        </div>
                        <div class="col-md-8">
                          <div class="form-group mb30">
                            <label class="form-label">Enter Password</label>
                            <input class="form-control" type="password" required  name="password" placeholder="Enter Password">
                            @error('password')
                                <span style="color: red;"></span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-sm-12">
                          <div class="form-group d-grid d-sm-flex mb0">
                            <button type="submit" class="style2 btn btn-thm me-3 mb15-520">Close Account</button>
                            <button type="button" class="style2 btn btn-white">Cancel</button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- nav tab contents End -->
            </div>
          </div>
        </div>
      </div>
    </div>
@endsection