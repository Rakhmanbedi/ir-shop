@extends('layouts.app')

@section('content')
    <a href="{{route('product.index')}}">Go to Index Posts</a>
    <h3>{{$product->title}}</h3>
    <p>{{$product->content}}</p>
    <a href="{{route('product.edit', $product->id)}}">Edit</a>

    <form action="{{route('comments.store',[$post->id])}}" method="post">
        @csrf


        Commentary:<br> <textarea  name="comment" cols="30" rows="10"></textarea>
        <br>
        <input type="hidden" name="post_id" value="{{$product->id}}">
        <button type="submit" >Save comment</button>

    </form>

    @foreach($comment as $com)
        @if($com->product_id==$product->id)
            <p>{{$com->comment}}</p>

            <a href="{{route('comments.edit',$com->id)}}">Edit</a>

            <br>
            <form action="{{route('comments.destroy', $com->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit">DELETE</button>
            </form>
        @endif
    @endforeach


@endsection
