@extends('frontend.layouts.shop')

@section('title', 'Auth')

@section('main-content')
    <div class="login-popup mx-auto">
        <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
            <ul class="nav nav-tabs text-uppercase" role="tablist">
                <li class="nav-item">
                    <a href="#sign-in" class="nav-link active">Sign In</a>
                </li>
                <li class="nav-item">
                    <a href="#sign-up" class="nav-link">Sign Up</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="sign-in">
                    <form class="form" method="post" action="{{ route('login.submit') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email"Email address *</label>
                                <input type="email" class="form-control" name="email" id="username"
                                    value="{{ old('email') }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="form-group mb-0">
                            <label>Password *</label>
                            <input type="password" class="form-control" name="password" value="{{ old('password') }}"
                                id="password" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-checkbox d-flex align-items-center justify-content-between">
                            <input type="checkbox" class="custom-checkbox" id="remember" name="remember">
                            <label for="remember">Remember me</label>
                            @if (Route::has('password.request'))
                                <a class="lost-pass" href="{{ route('password.reset') }}">
                                    Forgotten password?
                                </a>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                        {{-- <div class="text-center mt-5">
                        OR
                        <a href="{{route('login.redirect','facebook')}}" class="btn btn-facebook"><i class="ti-facebook"></i></a>
                        <a href="{{route('login.redirect','github')}}" class="btn btn-github"><i class="ti-github"></i></a>
                        <a href="{{route('login.redirect','google')}}" class="btn btn-google"><i class="ti-google"></i></a>
                    </div> --}}
                    </form>
                </div>
                <div class="tab-pane" id="sign-up">
                    <form class="form" method="post" action="{{ route('register.submit') }}">
                        @csrf
                        <div class="form-group mb-5">
                            <label for="fname">Your Name *</label>
                            <input type="text" class="form-control" name="name" id="fname" required
                                value="{{ old('name') }}">
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email_1">Your Email address *</label>
                            <input type="email" class="form-control" name="email" id="email_1" required
                                value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mb-5">
                            <label for="password_1">Password *</label>
                            <input type="password" class="form-control" name="password" id="password_1"
                                value="{{ old('password') }}" required>
                            @error('password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-5">
                            <label for="password_2">confirm Password *</label>
                            <input type="password" class="form-control"name="password_confirmation" placeholder=""
                                id="password_2" required="required" value="{{ old('password_confirmation') }}">
                            @error('password_confirmation')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <p>Your personal data will be used to support your experience
                            throughout this website, to manage access to your account,
                            and for other purposes described in our <a href="#" class="text-primary">privacy
                                policy</a>.</p>
                        {{-- <a href="#" class="d-block mb-5 text-primary">Signup as a Distributor?</a> --}}
                        <div class="form-checkbox d-flex align-items-center justify-content-between mb-5">
                            <input type="checkbox" class="custom-checkbox" id="agree" name="agree" required>
                            <label for="agree" class="font-size-md">I agree to the <a href="#"
                                    class="text-primary font-size-md">privacy policy</a></label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" onsubmit="emailValidator()">Sign
                            Up</button>
                        {{-- <div class="text-center mt-5">
                    OR
                    <a href="{{route('login.redirect','facebook')}}" class="btn btn-facebook"><i class="ti-facebook"></i></a>
                    <a href="{{route('login.redirect','github')}}" class="btn btn-github"><i class="ti-github"></i></a>
                    <a href="{{route('login.redirect','google')}}" class="btn btn-google"><i class="ti-google"></i></a>
                </div> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('styles')
    <style>
        .shop.login .form .btn {
            margin-right: 0;
        }

        .btn-facebook {
            background: #39579A;
        }

        .btn-facebook:hover {
            background: #073088 !important;
        }

        .btn-github {
            background: #444444;
            color: white;
        }

        .btn-github:hover {
            background: black !important;
        }

        .btn-google {
            background: #ea4335;
            color: white;
        }

        .btn-google:hover {
            background: rgb(243, 26, 26) !important;
        }
    </style>
@endpush
