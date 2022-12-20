@extends('layouts.adm')

@section('content')

    <form action="{{route('adm.users.update',$user->id)}} " method="post">
        @csrf
        @method('PUT')
        <select name="role_id" id="" class="form-select">
            @foreach($role as $rol)
                <option @if($rol->id==$user->role_id) selected @endif value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
        </select>
        <button class="btn btn-success" type="submit" >Update</button>

    </form>
@endsection
