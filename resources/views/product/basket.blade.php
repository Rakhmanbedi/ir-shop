@extends('layouts.app')

@section('content')
    <!-- Font Awesome -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        rel="stylesheet"
    />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
    />
    <!-- MDB -->
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.css"
        rel="stylesheet"
    />

    <link rel="stylesheet" href="{{asset('basket/basket.css')}}">
{{--    <div class="container">--}}
{{--        <div class="row">--}}

{{--                @csrf--}}
{{--                @foreach($products as $product)--}}
{{--                    <div class="col-sm-2">--}}
{{--                        <div class="card mt-3" style="border-radius: 10px">--}}
{{--                            <div class="card-body">--}}
{{--                                <img class="img-fluid mt-2" style="height: 150px; width: 300px" src="{{$product->url}}" alt="">--}}
{{--                                <h5 class="card-title"><b>{{$product->name}}</b></h5>--}}
{{--                                <p><b>KZT</b> {{$product->price}} tg</p>--}}
{{--                                <p>Color: {{$product->pivot->color}}</p>--}}
{{--                                <p>Size: {{$product->size}}   Amount: {{$product->pivot->amount}}</p>--}}

{{--                                <br>--}}
{{--                                <a class="btn btn-outline-warning" href="{{route('products.editBasket',$product->id)}}">Bye now</a>--}}
{{--                                <form action="{{route('products.unbasketAll', $product->id)}}" method="post">--}}
{{--                                    @csrf--}}
{{--                                    <button type="submit">un</button>--}}
{{--                                </form>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}




    <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container h-100 py-5">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col">
                    <div class="card shopping-cart" style="border-radius: 15px;">
                        <div class="card-body text-black">

                            <div class="row">
                                <div class="col-lg-6 px-5 py-4">

                                    <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">{{__('message.Your products')}}</h3>

                                    @csrf
                                    @foreach($products as $product)
                                        <div class="d-flex align-items-center mb-5">
                                            <div class="flex-shrink-0">
                                                <img src="{{$product->product->url}}"
                                                     class="img-fluid" style="width: 150px;" alt="Generic placeholder image">
                                            </div>
                                            <div class="flex-grow-1 ms-3">
                                                <form action="{{route('products.unbasketAll', $product->id)}}" method="post">
                                                    @csrf
                                                    <button class="float-end text-black" type="submit"><i class="fas fa-times"></i></button>
                                                </form>
                                                <h5 class="text-primary">{{$product->product->name}}</h5>
                                                <h6>{{__('message.Color')}}: {{$product->color}}</h6>
                                                <div class="d-flex align-items-center">
                                                    <p class="fw-bold mb-0 me-5 pe-3">{{$product->product->price*$product->amount}} ₸ </p>
                                                    <div class="def-number-input number-input safari_only">
                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepDown()"
                                                                class="minus">
                                                        </button>
                                                        <input class="quantity fw-bold text-black" min="0" name="quantity" value="{{$product->amount}}"
                                                               type="number">
                                                        <button onclick="this.parentNode.querySelector('input[type=number]').stepUp()"
                                                                class="plus">
                                                        </button>
                                                    </div>
                                                </div>
                                                <br>
                                                <br>
                                                <br>

                                                <form action="{{route('products.editBasket',$product->id)}}" method="post">
                                                    @csrf
                                                    @method('PUT')
                                                    <button class="btn btn-primary btn-block btn-lg" type="submit">{{__('message.By now')}}</button>
                                                </form>

                                            </div>
                                        </div>
                                    @endforeach

                                    <hr class="mb-4" style="height: 2px; background-color: #1266f1; opacity: 1;">




                                </div>
                                <div class="col-lg-6 px-5 py-4">

                                    <h3 class="mb-5 pt-2 text-center fw-bold text-uppercase">Payment</h3>

                                    <form class="mb-5">

                                        <div class="form-outline mb-5">
                                            <input type="text" id="typeText" class="form-control form-control-lg" siez="17" minlength="19" maxlength="19" />
                                            <label class="form-label" for="typeText">Card Number</label>
                                        </div>

                                        <div class="form-outline mb-5">
                                            <input type="text" id="typeName" class="form-control form-control-lg" siez="17"/>
                                            <label class="form-label" for="typeName">Name on card</label>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6 mb-5">
                                                <div class="form-outline">
                                                    <input type="text" id="typeExp" class="form-control form-control-lg"
                                                           size="7" id="exp" minlength="7" maxlength="7" />
                                                    <label class="form-label" for="typeExp">Expiration</label>
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-5">
                                                <div class="form-outline">
                                                    <input type="password" id="typeText" class="form-control form-control-lg" size="1" minlength="3" maxlength="3" />
                                                    <label class="form-label" for="typeText">Cvv</label>
                                                </div>
                                            </div>
                                        </div>

                                        <p class="mb-5">Lorem ipsum dolor sit amet consectetur, adipisicing elit <a
                                                href="#!">obcaecati sapiente</a>.</p>



                                        <h5 class="fw-bold mb-5" style="position: absolute; bottom: 0;">
                                            <a href="{{ url('/') }}"><i class="fas fa-angle-left me-2"></i>Back to shopping</a>
                                        </h5>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- MDB -->
    <script
        type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.0.1/mdb.min.js"
    ></script>
@endsection
