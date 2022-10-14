@extends('layouts.app')

@section('content')

    <a style="margin-left: 1300px" width="50" href="{{route('product.index')}}" class="btn btn-dark">Go to Product page</a>

    <div class="container">
        <div class="row">
            <div class="item__inner">
                <div class="item__inner-left">
                    <div class="mount-product-slider">
                       <div class="col-sm-4" style="margin-left: 200px">
                          <div class="card mt-3">
                             <img class="card-img-top" src="{{$products->url}}" alt="">
                          </div>
                       </div>
                    </div>
                </div>
                <div class="item__inner-right" >
                    <div class="col-sm-7" style="width: 550px; margin-left: 650px; margin-top: -378px" >
                        <div class="item__description">
                            <div class="mount-item-product">
                                <div class="card-body" style="height: 380px">
                                    <div class="row-cols-1">
                                        <h5 class="card-title"><h3>{{$products->name}}</h3></h5>
                                        <p class="card-text">Description:{{$products->description}}</p>
                                        <p>Size: {{$products->size}}</p>
                                        <p>Price: {{$products->price}} тг</p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
