@extends('layouts.master2')
@section('css')
    <!-- Sidemenu-respoansive-tabs css -->
    <link href="{{URL::asset('assets/plugins/sidemenu-responsive-tabs/css/sidemenu-responsive-tabs.css')}}"
          rel="stylesheet">
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
                            <img src="https://exonmed.co/upload/content_cat/1548848563.jpg" class="h-100 w-100"
                                 alt="logo">
                        </div>
                    </div>
                </div>
                <!-- The content half -->
                <div class="col-md-6 col-lg-6 col-xl-5" style="background-color: darkslateblue;">
                    <div class="login d-flex align-items-center py-2">
                        <!-- Demo content-->
                        <div class="container p-0">
                            <div class="row">
                                <div class="col-md-10 col-lg-10 col-xl-9 mx-auto">
                                    <div class="card-sigin">
                                        <div class="mb-5 d-flex"><a href="{{ url('/') }}">
                                                <img
                                                    src="https://www.itcodedev.com/storage/settings/667ESXBADR6BcNFuxr3smX6PZuYh0AYQF7N9PMJg.png"
                                                    class="sign-favicon ht-40" alt="logo">
                                            </a>
                                            <h1 class="main-logo1 ml-1 mr-0 my-auto tx-28"> اى تى كود للبرمجيات </h1>
                                        </div>
                                        <div class="card-sigin">
                                            <div class="main-signup-header">
                                                <h2>مرحباً بعودتك!</h2>
                                                <h5 class="font-weight-semibold mb-4">تسجيل دخول</h5>

                                                @if(session()->has('error'))
                                                    <div class="alert alert-danger">
                                                        {{ session()->get('error') }}
                                                    </div>
                                                @endif

                                                <form method="POST" action="{{ route('admin.post.login') }}">
                                                    @csrf
                                                    <div class="form-group">
                                                        <label>البريد الالكترونى</label>
                                                    </div>
                                                    <input id="email" placeholder="Enter your email" type="email"
                                                           class="form-control @error('email') is-invalid @enderror"
                                                           name="email" value="{{ old('email') }}" required
                                                           autocomplete="email" autofocus>

                                                    @error('email')
                                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                    @enderror
                                                    <div class="form-group">
                                                        <label>كلمة المرور</label>
                                                        <input id="password" placeholder="Enter your password"
                                                               type="password"
                                                               class="form-control @error('password') is-invalid @enderror"
                                                               name="password" required autocomplete="current-password">

                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <input class="form-check-input" type="checkbox" name="remember"
                                                               id="remember" {{ old('remember') ? 'checked' : '' }}>

                                                        <label class="form-check-label pr-4" for="remember">
                                                            تذكرنى
                                                        </label>
                                                    </div>
                                                    <button type="submit" class="btn btn-main-primary btn-block">
                                                        تسجيل دخول
                                                    </button>


                                                    <!--  <div class="row row-xs">
                                                         <div class="col-sm-6">
                                                             <button class="btn btn-block"><i class="fab fa-facebook-f"></i> Signup with Facebook</button>
                                                         </div>
                                                         <div class="col-sm-6 mg-t-10 mg-sm-t-0">
                                                             <button class="btn btn-info btn-block"><i class="fab fa-twitter"></i> Signup with Twitter</button>
                                                         </div>
                                                     </div> -->
                                                </form>
                                                <div class="main-signin-footer mt-5">
                                                    @if (Route::has('password.request'))
                                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                                            هل نسيت كلمة المرور ؟
                                                        </a>
                                                    @endif
                                                </div>
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
