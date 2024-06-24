@extends('frontend.layouts.shop')

@section('title', 'Become a sales person | ' . config('app.name'))

@section('main-content')
    <div class="page-content mb-10">
        <div class="container">
            <div class="shop-content toolbox-horizontal">
                <div class="login-popup">
                    <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                        <ul class="nav nav-tabs text-uppercase" role="tablist">
                            <li class="nav-item">
                                <a href="#sign-up" class="nav-link">Register Here</a>
                            </li>
                        </ul>
                        <form method="POST" action="{{route('salesPerson.onboarding.reg')}}" enctype="multipart/form-data" class="tab-pane" id="sign-up">
                            @csrf
                            <input type="file" name="profile" id="imageInput" accept="image/*" style="display: none;">

                            <div class="image-container">
                                <img id="selectedImage" src="{{ asset('backend/img/avatar.png') }}" alt="Selected Image" >
                            </div> <br>
                            <button id="iconButton" class="btn btn-primary">
                                <i class="bi bi-camera-fill" id="iconButton"></i> Select Image
                            </button> <br> <br>

                            <div class="form-group mb-5">
                                <label>State/Region *</label>
                                <select id="state" name="state" class="form-select">
                                    <option value="">--Select State--</option>
                                </select>
                            </div>

                            <div class="form-group mb-5">
                                <label>Projected monthly sales volume *</label>
                                <select id="monthly-volume" name="monthly_sales_volume" class="form-select">
                                    <option value="1-10 cartons">1-10 cartons</option>
                                    <option value="10-20 cartons">10-20 cartons</option>
                                    <option value="20-50 cartons">20-50 cartons</option>
                                    <option value="above 100 cartons">Above 100 cartons</option>
                                </select>
                            </div>

                            <div class="form-group mb-5">
                                <label>Full Name *</label>
                                <input type="text" class="form-control" name="fullname" id="fullname" @disabled(true) value="{{auth()->user()->name}}" required>
                            </div>
                            <div class="form-group mb-5">
                                <label>Referal Code *</label>
                                <input type="text" class="form-control" name="referral_code" id="lname" value="{{old('referral_code')}}" @required(true)>
                            </div>
                            <p>Your personal data will be used to support your experience
                                throughout this website, to manage access to your account,
                                and for other purposes described in our <a href="#" class="text-primary">privacy
                                    policy</a>.</p>
                            <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                                <input type="checkbox" class="custom-checkbox" id="agree" name="agree" @required(true)>
                                <label for="agree" class="font-size-md">I agree to the <a href="#"
                                        class="text-primary font-size-md">privacy policy</a></label>
                            </div>
                            <button type="submit" class="btn btn-primary" onsubmit="emailValidator()">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')

    <script>
        document.getElementById('iconButton').addEventListener('click', function() {
            document.getElementById('imageInput').click();
        });

        document.getElementById('imageInput').addEventListener('change', function(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('selectedImage').src = e.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        //For State dropdown
        document.addEventListener('DOMContentLoaded', function() {
            const stateDropdown = document.getElementById('state');
            const predefinedCountry = 'Nigeria';

            // Fetch and populate states based on predefined country
            fetch('https://countriesnow.space/api/v0.1/countries/states', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        country: predefinedCountry
                    })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.data && data.data.states) {
                        const states = data.data.states;
                        states.forEach(state => {
                            const option = document.createElement('option');
                            option.value = state.name;
                            option.textContent = state.name;
                            stateDropdown.appendChild(option);
                        });
                    } else {
                        console.error('States data not found in the response');
                    }
                })
                .catch(error => {
                    console.error('Error fetching state data:', error);
                });
        });
    </script>
@endpush

@push('styles')
    <style>
        .login-popup {
            margin: auto;
        }

        .image-container {
            width: 70px;
            height: 70px;
            border: 2px solid #ccc;
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
            overflow: hidden;
            border-radius: 50%;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        @media only screen and(max-width: 800px) {
            .login-popup {
                margin: 0;
            }
        }
    </style>
@endpush
