@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-7">
                <div class="card" style="border-radius: 15px">
                    <div class="card-header">{{ __('Login') }}
                        <img src="{{asset('logincss/images/bg-01.jpg')}}" alt="" style="border-radius: 15px">
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Login') }}
                                    </button>

                                    @if (Route::has('password.request'))
                                        <a class="btn btn-link" href="{{ route('password.request') }}">
                                            {{ __('Forgot Your Password?') }}
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>



    {{--        <!--===============================================================================================-->--}}
    {{--        <link rel="icon" type="image/png" href="{{asset('logincss/images/icons/favicon.ico')}}"/>--}}
    {{--        <!--===============================================================================================-->--}}
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('logincss/vendor/bootstrap/css/bootstrap.min.css')}}">--}}
    {{--        <!--===============================================================================================-->--}}
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('logincss/fonts/font-awesome-4.7.0/css/font-awesome.min.css')}}">--}}
    {{--        <!--===============================================================================================-->--}}
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('logincss/fonts/Linearicons-Free-v1.0.0/icon-font.min.css')}}">--}}
    {{--        <!--===============================================================================================-->--}}
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('logincss/vendor/animate/animate.css')}}">--}}
    {{--        <!--===============================================================================================-->--}}
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('logincss/vendor/css-hamburgers/hamburgers.min.css')}}">--}}
    {{--        <!--===============================================================================================-->--}}
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('logincss/vendor/animsition/css/animsition.min.css')}}">--}}
    {{--        <!--===============================================================================================-->--}}
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('logincss/vendor/select2/select2.min.css')}}">--}}
    {{--        <!--===============================================================================================-->--}}
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('logincss/vendor/daterangepicker/daterangepicker.css')}}">--}}
    {{--        <!--===============================================================================================-->--}}
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('logincss/css/util.css')}}">--}}
    {{--        <link rel="stylesheet" type="text/css" href="{{asset('logincss/css/main.css"')}}">--}}
    {{--        <!--===============================================================================================-->--}}

    {{--    <body>--}}

    {{--    <div class="limiter">--}}
    {{--        <div class="container-login100">--}}
    {{--            <div class="wrap-login100">--}}
    {{--                <div class="login100-form-title" style="background-image: url({{asset('logincss/images/bg-01.jpg')}});">--}}
    {{--					<span class="login100-form-title-1">--}}
    {{--						Sign In--}}
    {{--					</span>--}}
    {{--                </div>--}}

    {{--                <form class="login100-form validate-form">--}}
    {{--                    <div class="wrap-input100 validate-input m-b-26" data-validate="Username is required">--}}
    {{--                        <span class="label-input100">Username</span>--}}
    {{--                        <input class="input100" type="text" name="username" placeholder="Enter username">--}}
    {{--                        <span class="focus-input100"></span>--}}
    {{--                    </div>--}}

    {{--                    <div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">--}}
    {{--                        <span class="label-input100">Password</span>--}}
    {{--                        <input class="input100" type="password" name="pass" placeholder="Enter password">--}}
    {{--                        <span class="focus-input100"></span>--}}
    {{--                    </div>--}}

    {{--                    <div class="flex-sb-m w-full p-b-30">--}}
    {{--                        <div class="contact100-form-checkbox">--}}
    {{--                            <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">--}}
    {{--                            <label class="label-checkbox100" for="ckb1">--}}
    {{--                                Remember me--}}
    {{--                            </label>--}}
    {{--                        </div>--}}

    {{--                        <div>--}}
    {{--                            <a href="#" class="txt1">--}}
    {{--                                Forgot Password?--}}
    {{--                            </a>--}}
    {{--                        </div>--}}
    {{--                    </div>--}}

    {{--                    <div class="container-login100-form-btn">--}}
    {{--                        <button class="login100-form-btn">--}}
    {{--                            Login--}}
    {{--                        </button>--}}
    {{--                    </div>--}}
    {{--                </form>--}}
    {{--            </div>--}}
    {{--        </div>--}}
    {{--    </div>--}}

    {{--    <!--===============================================================================================-->--}}
    {{--    <script src="{{asset('logincss/vendor/jquery/jquery-3.2.1.min.js')}}"></script>--}}
    {{--    <!--===============================================================================================-->--}}
    {{--    <script src="{{asset('logincss/vendor/animsition/js/animsition.min.js')}}"></script>--}}
    {{--    <!--===============================================================================================-->--}}
    {{--    <script src="{{asset('logincss/vendor/bootstrap/js/popper.js')}}"></script>--}}
    {{--    <script src="{{asset('logincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>--}}
    {{--    <!--===============================================================================================-->--}}
    {{--    <script src="{{asset('logincss/vendor/select2/select2.min.js')}}"></script>--}}
    {{--    <!--===============================================================================================-->--}}
    {{--    <script src="{{asset('logincss/vendor/daterangepicker/moment.min.js')}}"></script>--}}
    {{--    <script src="{{asset('logincss/vendor/daterangepicker/daterangepicker.js')}}"></script>--}}
    {{--    <!--===============================================================================================-->--}}
    {{--    <script src="{{asset('logincss/vendor/countdowntime/countdowntime.js')}}"></script>--}}
    {{--    <!--===============================================================================================-->--}}
    {{--    <script src="{{asset('logincss/js/main.js')}}"></script>--}}

    {{--    </body>--}}

@endsection
