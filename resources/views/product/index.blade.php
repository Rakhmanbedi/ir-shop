@extends('layouts.app')

@section('content')




{{--    <img style="margin-left: 50px" width="80" src="https://i.pinimg.com/280x280_RS/2a/a4/61/2aa461ebf2ab25f4248f395d4ee41e58.jpg" alt="">--}}

   @can('create', App\Models\Product::class)
       <a href="{{route('product.create')}}"  class="btn btn-outline-dark" style="margin-left: 1200px">Add new product</a>
   @endcan

<link rel="stylesheet" type="text/css" href="{{asset('index.css')}}">
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>

</body>

    <hr style="">
<div class="container">
        <div class="row">
            <div class="col-sm-2">
                <ul class="navbar-nav">

                        <h5><b>Catalog</b></h5>

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
            </div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="row pb-5 mb-4">
                        @foreach($products as $product)
                            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                                <!-- Card-->
                                <div class="card rounded shadow-lg border-0">
                                    <div class="card-body p-4">
                                        <a href="{{route('product.show',[$product->id])}}">
                                            <img class="img-fluid mt-2" style="height: 200px; width: 300px" src="{{$product->url}}" alt="">
                                        </a>
                                        <h5> <h6 class="card-title">{{$product->name}}</h6></h5>
                                        <p>KZT {{$product->price}}tg</p>
                                        <ul class="list-inline small">
                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>
                                            <li class="list-inline-item m-0"><i class="fa fa-star-o text-success"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

        </div>
    </div>
{{--<a class="btn btn-primary" data-bs-toggle="offcanvas" href="#offcanvasExample" role="button" aria-controls="offcanvasExample">--}}
{{--    Link with href--}}
{{--</a>--}}
{{--<button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">--}}
{{--    Button with data-bs-target--}}
{{--</button>--}}

{{--<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">--}}
{{--    <div class="offcanvas-header">--}}
{{--        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>--}}
{{--        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>--}}
{{--    </div>--}}
{{--    <div class="offcanvas-body">--}}
{{--        <div>--}}
{{--            <div class="collapse navbar-collapse" id="navbarNavDarkDropdown">--}}
{{--                <ul class="navbar-nav">--}}
{{--                    <li class="nav-item dropdown">--}}
{{--                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">--}}
{{--                            Catalog--}}
{{--                        </a>--}}
{{--                        <ul class="dropdown-menu dropdown-menu-dark">--}}
{{--                            @isset($categories)--}}
{{--                                <li class="nav-item">--}}
{{--                                    <a class="nav-link" href="{{route('product.index')}}">All Products</a>--}}
{{--                                </li>--}}

{{--                                @foreach($categories as $cat)--}}
{{--                                    <li class="nav-item">--}}
{{--                                        <a class="nav-link" href="{{route('product.category', $cat->id)}}">{{$cat->name}}</a>--}}
{{--                                    </li>--}}
{{--                                @endforeach--}}
{{--                            @endisset--}}
{{--                        </ul>--}}
{{--                    </li>--}}
{{--                </ul>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="dropdown mt-3">--}}
{{--            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown">--}}
{{--                Dropdown button--}}
{{--            </button>--}}
{{--            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">--}}
{{--                <li><a class="dropdown-item" href="#">Action</a></li>--}}
{{--                <li><a class="dropdown-item" href="#">Another action</a></li>--}}
{{--                <li><a class="dropdown-item" href="#">Something else here</a></li>--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}


@endsection
