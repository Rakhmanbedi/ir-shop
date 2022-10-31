@extends('layouts.app')

@section('content')
    <div class="container">
       <a class="btn btn-dark" style="margin-left: 1230px;" href="{{route('product.index')}}">Menu</a>
        <br>
        <form action="{{route('product.update', $product->id)}}" method="post">
            @csrf
            @method('PUT')

            <input class="form-control form-control-lg" type="text" name="name" value="{{$product->name}}" placeholder="Product name">
            <br>
            <input class="form-control" type="text" name="url" placeholder="Product URL Photo" value="{{$product->url}}">
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

            <button class="btn btn-success" style="margin-left: 1152px;" type="submit">Update</button>

        </form>
    </div>
@endsection
