@extends('layouts.app')

@section('content')

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('basket/balance.css')}}">
    <div class="container">
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-md-4">
                    <div class="payment-card shadow-lg" style="border-radius: 10px">
                        <i class="fa fa-cc-visa payment-icon-big text-success"></i>
                         @if(Auth::user()->balance != null)
                            Balance: {{ Auth::user()->balance }} ₸
                        @endif
                        <form action="{{route('addBalance',\Illuminate\Support\Facades\Auth::user()->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            Add: <input type="text" name="balance" class="form-control">

                            <button type="submit" class="btn btn-primary">Add</button>
                        </form>

                        <h2>
                            **** **** **** 1060
                        </h2>
                        <div class="row">
                            <div class="col-sm-6">
                                <small>
                                    <strong>Expiry date:</strong> 10/16
                                </small>
                            </div>
                            <div class="col-sm-6 text-right">
                                <small>
                                    <strong>Name: </strong>{{ Auth::user()->name }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
