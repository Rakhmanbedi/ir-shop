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
                                    <a href="{{route('product.edit',$products->id)}}" class="btn btn-warning" style="width: 77px; margin-bottom: 10px;">Edit
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                        </svg>
                                    </a>

                                    <form action="{{route('product.destroy', $products->id)}}" method="post">

                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger" type="submit">DELETE
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                                <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <br>
                                    <button class="btn btn-secondary">Bye now
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                                            <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                                        </svg></button>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="h-75">
            <form action="{{route('comments.store',$products->id)}}" method="post">
                @csrf
                <textarea  class="form-control form-control-lg" name="comment"  cols="30" rows="10"></textarea>
                <input type="hidden" name="product_id" value="{{$products->id}}">
                <br>
                <button class="btn btn-success" type="submit">Save</button>
                <br>
            </form>

            @foreach($products->comments as $com)
                <hr>
                @if($com->product_id == $products->id)
                    <p>{{$com->comment}}</p>
                    <small>{{$com->user->name}} | {{$com->created_at}}</small>
                @endif
            <form action="{{route('comments.destroy', $com->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

            @endforeach
        </div>
    </div>

@endsection
