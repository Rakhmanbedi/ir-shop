<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>IR-Shop</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <img style="margin-left:" width="80" src="https://i.pinimg.com/280x280_RS/2a/a4/61/2aa461ebf2ab25f4248f395d4ee41e58.jpg" alt="">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <strong>IR-Shop</strong>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
{{--                    <ul class="navbar-nav me-auto">--}}
{{--                        @isset($categories)--}}
{{--                            <li class="nav-item">--}}
{{--                                <a class="nav-link" href="{{route('product.index')}}">All Products</a>--}}
{{--                            </li>--}}

{{--                            @foreach($categories as $cat)--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{route('product.category', $cat->id)}}">{{$cat->name}}</a>--}}
{{--                                </li>--}}
{{--                            @endforeach--}}
{{--                        @endisset--}}
{{--                    </ul>--}}

                    <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    Catalog
                                </a>
                                <ul class="dropdown-menu dropdown-menu-dark">
                                    @isset($categories)
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{route('product.index')}}">All Products</a>
                                        </li>

                                        @foreach($categories as $cat)
                                            <li class="nav-item">
                                                <a class="nav-link" href="{{route('product.category', $cat->id)}}">{{$cat->name}}</a>
                                            </li>
                                        @endforeach
                                    @endisset
                                </ul>
                            </li>
                        </ul>
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        <main class="py-4">

            @yield('content')
        </main>
    </div>
</body>

<style>

</style>

{{--<body>--}}
{{--<section class="ftco-section">--}}

{{--    <div class="container">--}}
{{--        <div class="row justify-content-between">--}}
{{--            <div class="col">--}}
{{--                <a class="navbar-brand" href="index.html">Papermag <span>Magazine</span></a>--}}
{{--            </div>--}}
{{--            <div class="col d-flex justify-content-end">--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">--}}
{{--        <div class="container">--}}

{{--            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--                <span class="fa fa-bars"></span> Menu--}}
{{--            </button>--}}
{{--            <form action="#" class="searchform order-lg-last">--}}
{{--                <div class="form-group d-flex">--}}
{{--                    <input type="text" class="form-control pl-3" placeholder="Search">--}}
{{--                    <button type="submit" placeholder="" class="form-control search"><span class="fa fa-search"></span></button>--}}
{{--                </div>--}}
{{--            </form>--}}
{{--            <div class="collapse navbar-collapse" id="ftco-nav">--}}
{{--                <ul class="navbar-nav mr-auto">--}}
{{--                    <li class="nav-item active"><a href="#" class="nav-link">Home</a></li>--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Catalog</a>--}}
{{--                        <div class="dropdown-menu" aria-labelledby="dropdown04">--}}
{{--                            @isset($categories)--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{route('product.index')}}">All Products</a>--}}
{{--                                </li>--}}
{{--        --}}
{{--                                @foreach($categories as $cat)--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{route('product.category', $cat->id)}}">{{$cat->name}}</a>--}}
{{--                                    </li>--}}
{{--                               @endforeach--}}
{{--                        @endisset--}}
{{--                        </div>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item"><a href="#" class="nav-link">Blog</a></li>--}}
{{--                    <li class="nav-item"><a href="#" class="nav-link">Contact</a></li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </nav>--}}
{{--    <!-- END nav -->--}}

{{--</section>--}}

{{--<script src="js/jquery.min.js"></script>--}}
{{--<script src="js/popper.js"></script>--}}
{{--<script src="js/bootstrap.min.js"></script>--}}
{{--<script src="js/main.js"></script>--}}

{{--</body>--}}
</html>

