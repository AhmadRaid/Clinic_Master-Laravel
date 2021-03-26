@extends('layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}" rel="stylesheet">
@endsection
@section('content')
    <!-- Page -->
    <div class="page">
        <div class="container-fluid">
            <div class="row no-gutter">
                <!-- The image half -->
                <div class="col-md-6 col-lg-6 col-xl-7 d-none d-md-flex bg-primary-transparent">
                    <div class="row wd-100p mx-auto text-center">
                        <div class="col-md-12 col-lg-12 col-xl-12 my-auto mx-auto wd-100p">
                            <img src="{{URL::asset('assets/img/media/reset.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-50p ht-xl-60p mx-auto" alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                    <div class="mb-5 d-flex"> <a href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Poster<span>att</span></h1></div>
                                    <div class="main-card-signin d-md-flex">
                                        <div class="wd-100p">
                                            <div class="main-signin-header">
                                                <div class="">
                                                    <h2>Welcome back!</h2>
                                                    <h4 class="text-left">{{ __('Reset Password') }}</h4>
                                                    <form method="POST" action="{{ route('password.update') }}">
                                                        @csrf

                                                        <input type="hidden" name="token" value="{{ $token }}">

                                                        <div class="form-group text-left">
                                                            <label for="email">{{ __('E-Mail Address') }}</label>
                                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter your email" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                        </div>

                                                        <label for="password">{{ __('Password') }}</label>

                                                <div class="form-group text-left">
                                                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Enter your password" name="password" required autocomplete="new-password">

                                                            @error('password')
                                                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group text-left">
                                                            <label for="password-confirm">{{ __('Confirm Password') }}</label>
                                                                <input id="password-confirm" type="password" class="form-control" placeholder="Enter your password" name="password_confirmation" required autocomplete="new-password">
                                                        </div>
                                                        <button class="btn ripple btn-main-primary btn-block" type="submit">
                                                            {{ __('Reset Password') }}
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                            <div class="main-signup-footer mg-t-20">
                                                <p>Already have an account? <a href="{{ route('login') }}">Sign In</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End -->
                    </div>
                </div><!-- End -->
            </div>
        </div>
    </div>
    <!-- End Page -->
@endsection
@section('js')
@endsection