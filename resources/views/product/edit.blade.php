@extends('layouts.app')

@section('content')
    <div class="container">
       <a class="btn btn-dark" style="margin-left: 1130px;" href="{{route('product.index')}}">{{__('message.Go to product page')}}</a>
        <br>
        <form action="{{route('product.update', $product->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <input class="form-control form-control-lg" type="text" name="name" value="{{$product->name}}" placeholder="Product name">
            <br>
            <input class="form-control form-control-lg" type="text" name="name_kz" value="{{$product->name_kz}}" placeholder="Product name">
            <br>
            <input class="form-control form-control-lg" type="text" name="name_en" value="{{$product->name_en}}" placeholder="Product name">
            <br>
            <input class="form-control form-control-lg" type="text" name="name_ru" value="{{$product->name_ru}}" placeholder="Product name">
            <br>
            <input class="form-control" type="file" name="url" placeholder="Product URL Photo" value="{{$product->url}}">
            <br>
            <input class="form-control" type="file" name="img_1" placeholder="Product URL Photo" value="{{$product->img_1}}">
            <br>
            <input class="form-control" type="file" name="img_2" placeholder="Product URL Photo" value="{{$product->img_2}}">
            <br>
            <input class="form-control" type="file" name="img_3" placeholder="Product URL Photo" value="{{$product->img_3}}">
            <br>
            <input class="form-control form-control-sm" type="text" placeholder="Size" name="size" value="{{$product->size}}">
            <br>
            <select name="category_id" class="form-select">
                @foreach($categories as $cat)
                    <option @if($cat->id == $product->categoty_id) selected @endif value="{{$cat->id}}">{{$cat->name}}</option>
                @endforeach

            </select>
            <br>
            <textarea class="form-control" name="description" id="" cols="30" rows="10">{{$product->description}}</textarea>
            <br>
            <input class="form-control form-control-lg" type="number" name="price" value="{{$product->price}}" placeholder="Product price">
            <br>

            <button class="btn btn-success" style="margin-left: 1152px;" type="submit">{{__('message.Update')}}</button>

        </form>
    </div>
@endsection
