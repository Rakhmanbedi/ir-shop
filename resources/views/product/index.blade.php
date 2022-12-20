@extends('layouts.app')

@section('content')





   @can('create', App\Models\Product::class)
       <div class="container">
           <a href="{{route('adm.users.index')}}" class="btn btn-outline-warning" style="margin-left: 1148px">Adminka</a>
       </div>
       <a href="{{route('product.create')}}"  class="btn btn-outline-dark" style="margin-left: 1200px">{{__('message.Add new product')}}</a>
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
{{--<div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-sm-2">--}}
{{--                <ul class="navbar-nav">--}}

{{--                        <h5><b>Catalog</b></h5>--}}

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




{{--                </ul>--}}
{{--            </div>--}}
{{--            <div class="col-sm-10">--}}
{{--                <div class="row">--}}
{{--                    <div class="row pb-5 mb-4">--}}
{{--                        @foreach($products as $product)--}}
{{--                            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">--}}
{{--                                <!-- Card-->--}}
{{--                                <div class="card rounded shadow-lg border-0">--}}
{{--                                    <div class="card-body p-4">--}}
{{--                                        <a href="{{route('product.show',[$product->id])}}">--}}
{{--                                            <img class="img-fluid mt-2" style="height: 200px; width: 300px" src="{{$product->url}}" alt="">--}}
{{--                                        </a>--}}
{{--                                        <h5> <h6 class="card-title">{{$product->name}}</h6></h5>--}}
{{--                                        <p>KZT {{$product->price}}tg</p>--}}
{{--                                        <ul class="list-inline small">--}}
{{--                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>--}}
{{--                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>--}}
{{--                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>--}}
{{--                                            <li class="list-inline-item m-0"><i class="fa fa-star text-success"></i></li>--}}
{{--                                            <li class="list-inline-item m-0"><i class="fa fa-star-o text-success"></i></li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        @endforeach--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </div>--}}
{{--    </div>--}}
{{--------------------------------------------------------------------------}}


   <section class="py-5">
       <div class="container px-4 px-lg-5 mt-5">
           <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
               @foreach($products as $product)
                   <div class="col-sm-4">
                       <div class="card" style="width: 18rem; border-color: black">
                           <div class="card-body text-center">
                               <a href="{{route('product.show',[$product->id])}}">
                                   <img  src="{{$product->url}}" class="card-img-top" style="height: 250px">
                               </a>

                               <h5 class="card-title "></h5>
                               <p class="card-title "></p>
                               <p class="card-title "></p>
                               <div class="row">
                                   <div class="col-sm-12">
                                       <h5 class="fw-bolder">{{$product->{ 'name_'.app()->getLocale()} }}</h5>
                                       <!-- Product reviews-->
                                       <div class="d-flex justify-content-center small text-warning mb-2">
                                           <div class="bi-star-fill"></div>
                                           <div class="bi-star-fill"></div>
                                           <div class="bi-star-fill"></div>
                                           <div class="bi-star-fill"></div>
                                           <div class="bi-star-fill"></div>
                                       </div>
                                       <!-- Product price-->
                                       <span class="text-muted text-decoration-line-through">20000 ₸</span>
                                       {{$product->price}} ₸
                                   </div>

                               </div>

                           </div>
                       </div>
                       <br>
                   </div>
               @endforeach
           </div>
       </div>
   </section>

   <!-- Bootstrap core JS-->
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
   <!-- Core theme JS-->
   <script src="{{asset('as/js/scripts.js')}}"></script>
   </body>
   </html>


@endsection
