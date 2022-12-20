@extends('layouts.adm')

@section('content')

    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Code</th>
                        <th scope="col"><a href="{{route('adm.users.addcategoryname')}}" class="btn btn-outline-primary">{{__('message.Add')}}</a></th>

                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i < count($category); $i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$category[$i]->{ 'name_'.app()->getLocale()} }}</td>
                            <td>{{$category[$i]->code}}</td>
                            <td>
                            </td>
{{--                            <td><a href="{{route('adm.users.edit',$users[$i]->id)}}" class="btn btn-warning">Edit</a></td>--}}
                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>

@endsection
