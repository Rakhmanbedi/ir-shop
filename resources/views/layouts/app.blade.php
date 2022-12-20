<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

{{--    -------------------------------------------------------------------------------}}
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>IR-Shop</title>

    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
{{--    <link type="text/css" rel="stylesheet" href="{{asset('resourcee/css/bootstrap.min.css')}}"/>--}}
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <!-- Slick -->
    <link type="text/css" rel="stylesheet" href="{{asset('resourcee/css/slick.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{asset('resourcee/css/slick-theme.css')}}"/>

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet" href="{{asset('resourcee/css/nouislider.min.css')}}"/>

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{asset('resourcee/css/font-awesome.min.css')}}">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet" href="{{asset('resourcee/css/style.css')}}"/>


{{--    ----------------------------------------------------------------------}}


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Fonts -->
{{--    <link rel="dns-prefetch" href="//fonts.gstatic.com">--}}
{{--    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">--}}

    <!-- Scripts -->
{{--    @vite(['resources/sass/app.scss', 'resources/js/app.js'])--}}




    <!-- Favicon-->
{{--    <link rel="icon" type="image/x-icon" href="{{asset('as/assets/favicon.ico')}}" />--}}
{{--    <!-- Bootstrap icons-->--}}
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />--}}
{{--    <!-- Core theme CSS (includes Bootstrap)-->--}}
{{--    <link href="{{asset('as/css/styles.css')}}" rel="stylesheet" />--}}

    {{--    -----------------------------------------------------------------------------------}}
{{--    <link href="{{asset('css/style.css')}}" rel="stylesheet">--}}

{{--    <link href="{{asset('asa/assets/img/favicon.png')}}" rel="icon">--}}

    {{--    ------------------------------------------------------------------------------------------}}

</head>
<body>
<!-- Navigation-->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container px-4 px-lg-5">
        <img width="100" class="ml-3" src="https://media-private.canva.com/Ja9D0/MAFUJvJa9D0/1/tl.png?X-Amz-Algorithm=AWS4-HMAC-SHA256&X-Amz-Credential=AKIAJWF6QO3UH4PAAJ6Q%2F20221219%2Fus-east-1%2Fs3%2Faws4_request&X-Amz-Date=20221219T040752Z&X-Amz-Expires=65634&X-Amz-Signature=a3b08cfed05e963e20b92ecd1b6c6d7fdccf6c430efac93e148e513247c17315&X-Amz-SignedHeaders=host&response-expires=Mon%2C%2019%20Dec%202022%2022%3A21%3A46%20GMT" alt="">
        <a class="navbar-brand" href="{{ url('/') }}">IR-Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav align-items-center ms-auto">
                <li class="nav-item"><a class="nav-link active" aria-current="page" href="{{ url('/') }}">{{__('message.Home')}}</a></li>
                <li class="nav-item"><a class="nav-link" href="{{route('about')}}">{{__('message.About')}}</a></li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">{{__('message.Shop')}}</a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @isset($categories)
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('product.index')}}">{{__('message.All Products')}}</a>
                            </li>

                            @foreach($categories as $cat)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('product.category', $cat->id)}}">{{$cat->{'name_'.app()->getLocale()} }}</a>
                                </li>
                            @endforeach
                        @endisset
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{config('app.languages')[app()->getLocale()]}}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        @foreach(config('app.languages') as $ln => $lang)
                            <a class="dropdown-item" href="{{route('switch.lang', $ln)}}">
                                {{$lang}}
                            </a>
                        @endforeach
                    </div>
                </li>
            </ul>
            <form class="d-none d-md-flex ms-3"  method="GET" action="{{route('search')}}" style="width: 400px">
                <input style="border-radius: 10px" class="form-control bg-white border-1 " name="search" type="search" placeholder="{{__('Search')}}">
            </form>

            <ul class="navbar-nav ms-auto">
                                    <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('message.login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('message.register') }}</a>
                        </li>
                    @endif
                @else

                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <img class="rounded-circle me-lg-2" src="{{\Illuminate\Support\Facades\Auth::user()->img}}" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">

                            <a href="{{route('profile')}}" class="dropdown-item">{{__('message.My Profile')}}</a>

                            <a class="dropdown-item" href="{{route('balance')}}">{{__('message.My balance')}}</a>

                            <a class="dropdown-item" href="{{route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('message.Logout') }}
                            </a>

                            <form id="logout-form" action="{{route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </div>

                @endguest

            </ul>
            <form class="d-flex">
                <a href="{{route('products.basket')}}">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                        <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                    </svg>
                </a>
            </form>

        </div>
    </div>
</nav>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
@if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif

        <main class="py-4">

            @yield('content')
        </main>
<!-- Footer-->
<footer class="py-5 bg-dark">
    <div class="container"><p class="m-0 text-center text-white">Copyright &copy; Your Website 2022</p></div>
</footer>


<script src="{{asset('resourcee/js/jquery.min.js')}}"></script>
<script src="{{asset('resourcee/js/bootstrap.min.js')}}"></script>
<script src="{{asset('resourcee/js/slick.min.js')}}"></script>
<script src="{{asset('resourcee/js/nouislider.min.js')}}"></script>
<script src="{{asset('resourcee/js/jquery.zoom.min.js')}}"></script>
<script src="{{asset('resourcee/js/main.js')}}"></script>
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</html>

