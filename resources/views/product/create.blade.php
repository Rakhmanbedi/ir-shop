@extends('layouts.app')

@section('content')
<div class="container" >

    <img style="margin-left: 10px" width="100" src="https://i.pinimg.com/280x280_RS/2a/a4/61/2aa461ebf2ab25f4248f395d4ee41e58.jpg" alt="">
    IR-Shop
    <a href="{{route('product.index')}}" style="margin-left: 950px" class="btn-outline-dark">{{__('message.Go to product page')}}</a>

    <form action="{{route('product.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input-group mb-3" >
            <span class="input-group-text" id="inputGroup-sizing-default" >{{__('message.Product name')}}</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
        </div>

        <div class="input-group mb-3" >
            <span class="input-group-text" id="inputGroup-sizing-default" >{{__('message.Product name EN')}}</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name_en" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
        </div>

        <div class="input-group mb-3" >
            <span class="input-group-text" id="inputGroup-sizing-default" >{{__('message.Product name KZ')}}</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name_kz" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
        </div>

        <div class="input-group mb-3" >
            <span class="input-group-text" id="inputGroup-sizing-default" >{{__('message.Product name RU')}}</span>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name_ru" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
        </div>


        <div class="input-group mb-3">
            <input type="file" class="form-control @error('url') is-invalid @enderror" id="urlInut"  name="url">
            <label class="input-group-text" for="inputGroupFile02">Input photo (1)</label>
        </div>

        <div class="input-group mb-3">
            <input type="file" class="form-control @error('url') is-invalid @enderror" id="urlInut"  name="img_1">
            <label class="input-group-text" for="inputGroupFile02">Input photo (2)</label>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control @error('url') is-invalid @enderror" id="urlInut"  name="img_2">
            <label class="input-group-text" for="inputGroupFile02">Input photo (3) </label>
        </div>
        <div class="input-group mb-3">
            <input type="file" class="form-control @error('url') is-invalid @enderror" id="urlInut"  name="img_3">
            <label class="input-group-text" for="inputGroupFile02">Input photo (4)</label>
        </div>

{{--        <div class="input-group mb-3" style="width: 1000px">--}}
{{--            <span class="input-group-text" id="inputGroup-sizing-default" >Photo URL</span>--}}
{{--            <input type="text" class="form-control @error('url') is-invalid @enderror" name="url" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >--}}
{{--        </div>--}}
        <div class="input-group mb-3">
            <span class="input-group-text" id="inputGroup-sizing-default" >{{__('message.Size')}}</span>
            <input type="text" class="form-control @error('size') is-invalid @enderror" name="size" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
        </div>
        <div class="mb-3">
            <label for="categoryInput" class="form-label" >Select</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="categoryInput" name="category_id" >
                @foreach($categories as $cat)
                    <option value="{{$cat->id}}">{{$cat->{'name_'.app()->getLocale()} }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-floating">
            <textarea class="form-control @error('description') is-invalid @enderror" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px; "></textarea>
            <label for="floatingTextarea2">{{__('message.Description')}}</label>
        </div>

        <br>
        <div class="input-group mb-3" >
            <span class="input-group-text" id="inputGroup-sizing-default" >{{__('message.Price')}}</span>
            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" >
        </div>

        <br>
        <button type="submit" class="btn btn-success" style="width: 100px; margin-left: 900px">{{__('message.Sale')}}</button>
    </form>

</div>


@endsection
