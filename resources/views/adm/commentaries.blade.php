@extends('layouts.adm')

@section('content')
    <div class="container">
        @foreach($comments as $com)
            <hr>

            <p>{{$com->comment}}</p>
            <small>{{$com->user->name}} | {{$com->created_at}}</small>

            <form action="{{route('comments.destroy', $com->id)}}" method="post">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>

        @endforeach
    </div>


@endsection
