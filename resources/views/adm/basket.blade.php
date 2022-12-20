@extends('layouts.adm')

@section('content')
    <div class="col-12">
        <div class="bg-secondary rounded h-100 p-4">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Number</th>
                        <th scope="col">Price</th>
                        <th scope="col">User Name</th>
                        <th scope="col">$</th>

                    </tr>
                    </thead>
                    <tbody>
                    @for($i = 0; $i < count($basket); $i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$basket[$i]->product->name}}</td>
                            <td>{{$basket[$i]->amount}}</td>
                            <td>{{$basket[$i]->product->price*$basket[$i]->amount}}</td>

                            <td>
                                {{$basket[$i]->user->name}}
                            </td>

                                <td>
                                    <form action="{{route('adm.updateBasket',$basket[$i]->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type="submit" class="btn btn-outline-warning">Confirm</button>
                                    </form>
                                    </td>

                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
