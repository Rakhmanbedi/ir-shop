@extends('layouts.app')

@section('content')


    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- Product main img -->
                <div class="col-md-4 col-md-push-1">
                    <div id="product-main-img">
                        <div class="product-preview">
                            <img src="{{$products->url}}" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="{{$products->img_1}}" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="{{$products->img_2}}" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="{{$products->img_3}}" alt="">
                        </div>
                    </div>
                </div>
                <!-- /Product main img -->

                <!-- Product thumb imgs -->
                <div class="col-md-1  col-md-pull-3">
                    <div id="product-imgs">
                        <div class="product-preview">
                            <img src="{{$products->url}}" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="{{$products->img_1}}" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="{{$products->img_2}}" alt="">
                        </div>

                        <div class="product-preview">
                            <img src="{{$products->img_3}}" alt="">
                        </div>
                    </div>
                </div>
                <!-- /Product thumb imgs -->



                <!-- Product details -->
                <div class="col-md-5">
                    <div class="product-details">
                        <h2 class="product-name">{{$products->{ 'name_'.app()->getLocale()} }}</h2>
                        <div>
                            <div class="product-rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <a class="review-link" href="#">10 Review(s) | Add your review</a><br>
                            <p>{{__('message.Size')}}: {{$products->size}}</p>
                        </div>
                        <div>
                            <h3 class="product-price">{{$products->price}} <del class="product-old-price">tg</del></h3>
                            <span class="product-available">In Stock</span>
                        </div>
                        <p>{{$products->description}}</p>
                        <form action="{{route('products.basketAll', $products->id)}}" method="post">
                            @csrf
                                <div class="product-options">
                                    <label>
                                        {{__('message.Size')}}
                                        <select class="input-select" name="size">
                                            @for($i=38; $i<=45; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>
                                    </label>
                                    <label>
                                        {{__('message.Color')}}<select class="input-select" name="color">
                                            <option value="white">{{__('message.white')}}</option>
                                            <option value="black">{{__('message.black')}}</option>
                                            <option value="red">{{__('message.red')}}</option>
                                            <option value="blue">{{__('message.blue')}}</option>
                                            <option value="yellow">{{__('message.yellow')}}</option>
                                            <option value="green">{{__('message.green')}}</option>
                                        </select>
                                    </label>
                                </div>

                                <div class="add-to-cart">
                                    <div class="qty-label">
                                        {{__('message.Amount')}}<select class="input-select" name="amount">
                                            @for($i=1; $i<=100; $i++)
                                                <option value="{{$i}}">{{$i}}</option>
                                            @endfor
                                        </select>

                                    </div>
                                    <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
                                </div>
                        </form>

                        <ul class="product-links">
                            <li>
                                @can('edit', $products)
                                    <a href="{{route('product.edit',$products->id)}}" class="btn btn-warning" style="width: 100px; margin-bottom: 10px;">{{__('message.Edit')}}
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>
                                @endcan
                            </li>
                            <li>
                                @can('delete', $products)
                                    <form action="{{route('product.destroy', $products->id)}}" method="post">

                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">{{__('message.DELETE')}}
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                        </button>
                                    </form>
                                @endcan
                            </li>
                        </ul>



                    </div>
                </div>
                <!-- /Product details -->

                <!-- Product tab -->
                <div class="col-md-12">
                    <div id="product-tab">
                        <!-- product tab nav -->
                        <ul class="tab-nav">
                            <li class="active"><a data-toggle="tab" href="#tab1">{{__('message.Commentaries')}}</a></li>
                        </ul>
                        <!-- /product tab nav -->

                        <!-- product tab content -->
                        <div class="tab-content">
                            <!-- tab1  -->
                            <form action="{{route('comments.store',$products->id)}}" method="post">
                                @csrf
                                <textarea  class="form-control form-control-lg" name="comment"  cols="30" rows="10"></textarea>
                                <input type="hidden" name="product_id" value="{{$products->id}}">
                                <br>
                                <button class="btn btn-success" type="submit">{{__('message.Save')}}</button>
                                <br>
                            </form>

                            @foreach($products->comments as $com)
                                <hr>
                                @if($com->product_id == $products->id)
                                    <p>{{$com->comment}}</p>
                                    <small>{{$com->user->name}} | {{$com->created_at}}</small>
                                @endif
                                @can('delete', $comment)
                                    <form action="{{route('comments.destroy', $com->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">{{__('message.DELETE')}}</button>
                                    </form>
                                @endcan

                            @endforeach
                            <!-- /tab1  -->


                            <!-- /tab3  -->
                        </div>
                        <!-- /product tab content  -->
                    </div>
                </div>
                <!-- /product tab -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>


{{--    <a style="margin-left: 1250px" width="50" href="{{route('product.index')}}" class="btn btn-dark">{{__('message.Go to product page')}}</a>--}}

{{--    <div class="container shadow-lg border-2">--}}
{{--        <div class="row">--}}
{{--            <div class="item__inner">--}}
{{--                <div class="item__inner-left">--}}
{{--                    <div class="mount-product-slider">--}}
{{--                       <div class="col-sm-5" style="margin-left: 80px">--}}
{{--                          <div class="card mt-3" style="border-radius: 20px">--}}
{{--                             <img class="card-img-top" src="{{$products->url}}" alt="" style="border-radius: 20px">--}}
{{--                          </div>--}}
{{--                       </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="item__inner-right" >--}}
{{--                    <div class="col-sm-7" style="width: 550px; margin-left: 650px; margin-top: -375px" >--}}
{{--                        <div class="item__description">--}}
{{--                            <div class="mount-item-product">--}}
{{--                                <div class="card-body" style="height: 500px">--}}
{{--                                    <div class="row-cols-1">--}}
{{--                                        @auth--}}
{{--                                            <form action="{{route('products.rate', $products->id)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <select name="rate">--}}
{{--                                                    @for($i=0; $i<=5; $i++)--}}
{{--                                                        {{$myRating == $i ? 'selected' : ''}}--}}
{{--                                                        <option  value="{{$i}}">--}}
{{--                                                            {{$i == 0 ? 'Not rated' : $i}}--}}
{{--                                                        </option>--}}
{{--                                                    @endfor--}}
{{--                                                </select>--}}
{{--                                                <button type="submit">Rate</button>--}}
{{--                                            </form>--}}

{{--                                            <form action="{{route('products.unrate', $products->id)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <button type="submit">UnRate</button>--}}
{{--                                            </form>--}}




{{--                                            <form action="{{route('products.basketAll', $products->id)}}" method="post">--}}
{{--                                                @csrf--}}
{{--                                                <input type="hidden" value="{{$products->name}}" name="name">--}}
{{--                                                {{__('message.Color')}}:<select name="color">--}}
{{--                                                    <option value="white">{{__('message.white')}}</option>--}}
{{--                                                    <option value="black">{{__('message.black')}}</option>--}}
{{--                                                    <option value="red">{{__('message.red')}}</option>--}}
{{--                                                    <option value="blue">{{__('message.blue')}}</option>--}}
{{--                                                    <option value="yellow">{{__('message.yellow')}}</option>--}}
{{--                                                    <option value="green">{{__('message.green')}}</option>--}}
{{--                                                </select>--}}
{{--                                                {{__('message.Size')}}:--}}
{{--                                                <select name="size">--}}
{{--                                                    @for($i=38; $i<=45; $i++)--}}
{{--                                                        <option value="{{$i}}">{{$i}}</option>--}}
{{--                                                    @endfor--}}
{{--                                                </select>--}}
{{--                                                    {{__('message.Amount')}}:<select name="amount">--}}
{{--                                                        @for($i=1; $i<=100; $i++)--}}
{{--                                                            <option value="{{$i}}">{{$i}}</option>--}}
{{--                                                        @endfor--}}
{{--                                                    </select>--}}
{{--                                                     <button type="submit">{{__('message.Basket')}}--}}
{{--                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">--}}
{{--                                                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>--}}
{{--                                                        </svg>--}}
{{--                                                    </button>--}}



{{--                                                <h4>{{$products->price}}</h4>--}}
{{--                                            </form>--}}

{{--                                        @endauth--}}
{{--                                        <h5 class="card-title"><h3>{{$products->name}}</h3></h5>--}}
{{--                                        <p class="card-text">{{__('message.Description')}}:--}}
{{--                                            <br>{{$products->description}}</p>--}}
{{--                                        <p>{{__('message.Size')}}: {{$products->size}}</p>--}}
{{--                                        <p>{{__('message.Price')}}: {{$products->price}} тг</p>--}}
{{--                                    </div>--}}
{{--                                    @can('edit', $products)--}}
{{--                                        <a href="{{route('product.edit',$products->id)}}" class="btn btn-warning" style="width: 100px; margin-bottom: 10px;">{{__('message.Edit')}}--}}
{{--                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">--}}
{{--                                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>--}}
{{--                                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>--}}
{{--                                            </svg>--}}
{{--                                        </a>--}}
{{--                                    @endcan--}}

{{--                                    @can('delete', $products)--}}
{{--                                        <form action="{{route('product.destroy', $products->id)}}" method="post">--}}

{{--                                            @csrf--}}
{{--                                            @method('DELETE')--}}
{{--                                            <button class="btn btn-danger" type="submit">{{__('message.DELETE')}}--}}
{{--                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">--}}
{{--                                                    <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>--}}
{{--                                                </svg>--}}
{{--                                            </button>--}}
{{--                                        </form>--}}
{{--                                    @endcan--}}
{{--                                    <br>--}}
{{--                                    <button class="btn btn-secondary">{{__('message.Bye now')}}--}}
{{--                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet" viewBox="0 0 16 16">--}}
{{--                                            <path d="M0 3a2 2 0 0 1 2-2h13.5a.5.5 0 0 1 0 1H15v2a1 1 0 0 1 1 1v8.5a1.5 1.5 0 0 1-1.5 1.5h-12A2.5 2.5 0 0 1 0 12.5V3zm1 1.732V12.5A1.5 1.5 0 0 0 2.5 14h12a.5.5 0 0 0 .5-.5V5H2a1.99 1.99 0 0 1-1-.268zM1 3a1 1 0 0 0 1 1h12V2H2a1 1 0 0 0-1 1z"/>--}}
{{--                                        </svg>--}}
{{--                                    </button>--}}

{{--                                    @if($avgRating != 0)--}}
{{--                                        <h5>R:{{$avgRating}}</h5>--}}
{{--                                    @endif--}}
{{--                                </div>--}}

{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <hr class="h-75">--}}
{{--            <form action="{{route('comments.store',$products->id)}}" method="post">--}}
{{--                @csrf--}}
{{--                <textarea  class="form-control form-control-lg" name="comment"  cols="30" rows="10"></textarea>--}}
{{--                <input type="hidden" name="product_id" value="{{$products->id}}">--}}
{{--                <br>--}}
{{--                <button class="btn btn-success" type="submit">{{__('message.Save')}}</button>--}}
{{--                <br>--}}
{{--            </form>--}}

{{--            @foreach($products->comments as $com)--}}
{{--                <hr>--}}
{{--                @if($com->product_id == $products->id)--}}
{{--                    <p>{{$com->comment}}</p>--}}
{{--                    <small>{{$com->user->name}} | {{$com->created_at}}</small>--}}
{{--                @endif--}}
{{--            <form action="{{route('comments.destroy', $com->id)}}" method="post">--}}
{{--                @csrf--}}
{{--                @method('DELETE')--}}
{{--                <button type="submit" class="btn btn-danger">{{__('message.DELETE')}}</button>--}}
{{--            </form>--}}

{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
