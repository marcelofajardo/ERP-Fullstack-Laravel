@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-5 row">
        <div class="mx-auto col-md-10">
            <h4>{{__('Edit product')}}</h4><br>
            <form method="POST" action="{{ route('product.update', $product->id) }}">
                @csrf
                @method('PUT')
                <!--CAMPO NAME-->
                <div class="form-group mt-1">
                    <label for="name">{{__('Name')}}</label>
                    <input name="name" type="text" class="form-control" id="name" value="{{ old('name', $product->name) }}">
                </div>
                @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!--CAMPO BRAND-->
                <div class="form-group mt-1">
                    <label for="brand">{{__('brand')}}</label>
                    <input name="brand" type="text" class="form-control" id="brand" value="{{ old('brand', $product->brand) }}">
                </div>
                @error('brand')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!--CAMPO DESCRIPTION-->
                <div class="form-group mt-1">
                    <label for="description">{{__('Description')}}</label>
                    <input name="description" type="text" class="form-control" id="description" value="{{ old('description', $product->description) }}">
                </div>
                @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror

                <!--CAMPO IMAGE-->
                <div class="form-group mt-1">
                    <label for="image">{{__('Image')}}</label>
                    <input name="image" type="text" class="form-control" id="image" value="{{ old('image', $product->image) }}">
                </div>
                @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror


                <div class="d-flex justify-content-between">
                    <!--CAMPO price-->
                    <div class="form-group mt-1">
                        <label for="price">{{__('Price (integer)')}}</label>
                        <input name="price" type="text" class="form-control" id="price" value="{{ old('price', $product->price) }}">
                    </div>
                    @error('price')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <!--CAMPO stock-->
                    <div class="form-group mt-1">
                        <label for="stock">{{__('In stock')}}</label>
                        <input name="stock" type="text" class="form-control" id="stock" value="{{ old('stock', $product->stock) }}">
                    </div>
                    @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                    <!--CAMPO sales-->
                    <div class="form-group mt-1">
                        <label for="sales"><input name="sales" type="checkbox" id="sales" @php if($product->sales == 1) { echo 'checked'; } @endphp >  {{__('Shipping available')}}</label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary mt-4">{{__('Save')}}}}</button>
            </form>
            <br/>
            <form method="GET" action="{{route('product.index')}}">
                @csrf
                <button class="btn btn-secondary" type="submit" href="">{{__('Go back')}}</button>
            </form>
        </div>
    </div>
</div>
@endsection