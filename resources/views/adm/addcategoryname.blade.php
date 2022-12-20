@extends('layouts.adm')`

@section('content')
<div class="container mt-5 m-lg-3" >
    <div class="col-sm-12 col-xl-6">
        <div class="bg-secondary rounded h-100 p-4">
            <h6 class="mb-4">{{__('message.Add Category')}}</h6>
            <form action="{{route('adm.categories.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('message.Category name')}}</label>
                    <input type="text" class="form-control" id=""
                           aria-describedby="emailHelp" name="name">
                    <div id="" class="form-text">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('message.Category name EN')}}</label>
                    <input type="text" class="form-control" id=""
                           aria-describedby="emailHelp" name="name_en">
                    <div id="" class="form-text">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('message.Category name KZ')}}</label>
                    <input type="text" class="form-control" id=""
                           aria-describedby="emailHelp" name="name_kz">
                    <div id="" class="form-text">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">{{__('message.Category name RU')}}</label>
                    <input type="text" class="form-control" id=""
                           aria-describedby="emailHelp" name="name_ru">
                    <div id="" class="form-text">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">{{__('message.Category code')}}</label>
                    <input type="text" class="form-control" id="" name="code">
                </div>
                <div class="btn-group" role="group">
                    <button type="submit" class="btn btn-success">{{__('message.Add')}}</button>
                    <button type="button" class="btn btn-close-white">______________________________________________________</button>
                    <button type="button" class="btn btn-danger" href="">Back</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
