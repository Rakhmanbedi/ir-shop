@extends('layouts.app')

@section('content')




{{--    <img style="margin-left: 50px" width="80" src="https://i.pinimg.com/280x280_RS/2a/a4/61/2aa461ebf2ab25f4248f395d4ee41e58.jpg" alt="">--}}

   @can('create', App\Models\Product::class)
       <a href="{{route('product.create')}}"  class="btn btn-outline-dark" style="margin-left: 1200px">Add new product</a>
   @endcan
    <hr style="">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-10">


{{--                <div id="carouselExampleSlidesOnly" class="carousel slide mt-3" data-bs-ride="carousel" style="width: 50rem">--}}
{{--                    <div class="carousel-inner">--}}
{{--                        <div class="carousel-item active">--}}
{{--                            <img style="border-radius: 8px" src="https://img.freepik.com/premium-vector/welcome-sign-letters-with-confetti-background-celebration-greeting-holiday-illustration-banner-confetti-decoration_41737-257.jpg?w=2000" class="d-block  img-fluid" alt="...">--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <img src="" class="d-block w-100" alt="...">--}}
{{--                        </div>--}}
{{--                        <div class="carousel-item">--}}
{{--                            <img src="..." class="d-block w-100" alt="...">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                   </div>
                </div>
            </div>



    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-sm-4">
                <div class="card mt-3" >
                    <div class="card-body">
                        <h6 class="card-title">{{$product->name}}</h6>
                        <a href="{{route('product.show',[$product->id])}}">
                        <img class="img-fluid mt-2" style="height: 350px; width: 300px" src="{{$product->url}}" alt="">
                        </a>
{{--                        <p class="card-text">Description: {{$product->description}}</p>--}}
                        <p>Price: {{$product->price}}</p>
                        <br>
{{--                            <a href="{{route('$product.show',$product->id)}}" class="btn btn-primary">Read more</a>--}}

                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>






{{--    <img width="1500" src="https://cloudinary.hbs.edu/hbsit/image/upload/s--EmT0lNtW--/f_auto,c_fill,h_375,w_750,/v20200101/6978C1C20B650473DD135E5352D37D55.jpg" alt="">--}}

{{--    <div class="container">--}}
{{--        <div class="row justify-content-center">--}}
{{--            <div class="col-md-10">--}}
{{--                <a class="btn btn-outline-dark" href="{{route('posts.create')}}">Go to Create Posts</a>--}}
{{--                @foreach($posts as $post)--}}
{{--                    <div class="card" style="width: 50rem;">--}}
{{--                        <div class="card-body">--}}
{{--                            <h5 class="card-title">{{$post->title}}</h5>--}}
{{--                            <p class="card-text">{{$post->content}}</p>--}}
{{--                            <br>--}}
{{--                            <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary">Read more</a>--}}
{{--                            <form action="{{route('posts.destroy', $post->id)}}" method="post">--}}
{{--                                <br>--}}
{{--                                @csrf--}}
{{--                                @method('DELETE')--}}
{{--                                <button class="btn btn-dang er" type="submit">DELETE</button>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <br>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
