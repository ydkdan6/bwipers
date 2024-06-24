@extends('frontend.layouts.shop')

@section('title', 'Login / Sign up - ' . config('app.name'))

@section('main-content')

    <div class="login-popup mx-auto">
        
        @if (!is_null($token) && !is_null($email))

        <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
            <ul class="nav nav-tabs text-uppercase" role="tablist">
                <li class="nav-item">
                    <a href="#enter-email" class="nav-link active">Reset Your Password</a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="enter-email">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf
                        
                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group">
                            <label>Enter Email Address *</label>
                            <input type="email" class="form-control" name="email" id="email" value="{{ $email }}" required readonly>
                            @error('email')
                                <span class="text-danger" style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Password *</label>
                            <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" autocomplete="new-password" required>
                            @error('password')
                                <span class="text-danger" style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Confirm Password *</label>
                            <input type="password" class="form-control" name="password_confirmation" id="password-confirm" value="{{ old('password') }}" autocomplete="new-password" required>
                            @error('password_confirmation')
                                <span class="text-danger" style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">Reset Password</button>
                    </form>
                </div>
                
            </div>
        </div>
            
        @else
        
        <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
            <ul class="nav nav-tabs text-uppercase" role="tablist">
                <li class="nav-item">
                    <a href="#enter-email" class="nav-link active">Enter Email</a>
                </li>
                {{-- <li class="nav-item">
                <a href="#enter-otp" class="nav-link">Enter OTP</a>
            </li> --}}
            </ul>
            <div class="tab-content">
                <div class="tab-pane active" id="enter-email">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf
                        <div class="form-group">
                            <label>Enter Email Address *</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                            @error('email')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Recover password</button>
                    </form>
                </div>
                
            </div>
        </div>

        @endif

        
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

{{-- 
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection --}}
