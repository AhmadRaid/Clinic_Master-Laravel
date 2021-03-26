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
                            <img src="{{URL::asset('assets/img/media/login.png')}}" class="my-auto ht-xl-80p wd-md-100p wd-xl-80p mx-auto" alt="logo">
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
                                    <div class="card-sigin">
                                        <div class="mb-5 d-flex"> <a href="{{ url('/') }}"><img src="{{URL::asset('assets/img/brand/favicon.png')}}" class="sign-favicon ht-40" alt="logo"></a><h1 class="main-logo1 ml-1 mr-0 my-auto tx-28">Poster<span>att</span></h1></div>
                                        <div class="main-signup-header">
                                            <h2 class="text-primary">{{ __('Register') }}</h2>
                                            <h5 class="font-weight-normal mb-4">It's free to signup and only takes a minute.</h5>
                                            <form method="POST" action="{{ route('register') }}">
                                                @csrf

                                                <div class="form-group row">
                                                    <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('First Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus>

                                                        @error('first_name')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Last Name') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus>

                                                        @error('last_name')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>

                                                        @error('phone')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="form-group row">
                                                    <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                                        @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label for="bio" class="col-md-4 col-form-label text-md-right">{{ __('Bio') }}</label>

                                                    <div class="col-md-6">
                                                        <input id="bio" type="text" class="form-control @error('bio') is-invalid @enderror" name="bio" value="{{ old('bio') }}" required autocomplete="bio">

                                                        @error('bio')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group row mb-0">
                                                    <div class="col-md-6 offset-md-4">
                                                        <button type="submit" class="btn btn-main-primary btn-block">
                                                            {{ __('Register') }}
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Firstname &amp; Lastname</label> <input class="form-control" placeholder="Enter your firstname and lastname" type="text">--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Email</label> <input class="form-control" placeholder="Enter your email" type="text">--}}
                                                {{--</div>--}}
                                                {{--<div class="form-group">--}}
                                                    {{--<label>Password</label> <input class="form-control" placeholder="Enter your password" type="password">--}}
                                                {{--</div><button class="btn btn-main-primary btn-block">Create Account</button>--}}
                                                {{--<div class="row row-xs">--}}
                                                    {{--<div class="col-sm-6">--}}
                                                        {{--<button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>--}}
                                                    {{--</div>--}}
                                                    {{--<div class="col-sm-6 mg-t-10 mg-sm-t-0">--}}
                                                        {{--<button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>--}}
                                                    {{--</div>--}}
                                                {{--</div>--}}
                                            </form>
                                            <div class="main-signup-footer mt-5">
                                                <p>Already have an account? <a href="{{ route('login')}}">Sign In</a></p>
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
{{--@extends('layouts.app')--}}

{{--@section('content')--}}
{{--<div class="container">--}}
    {{--<div class="row justify-content-center">--}}
        {{--<div class="col-md-8">--}}
            {{--<div class="card">--}}
                {{--<div class="card-header">{{ __('Register') }}</div>--}}
                {{--<div class="card-body">--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
{{--</div>--}}
{{--@endsection--}}
