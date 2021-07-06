@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center  card">
                <div class="card-header bg-warning">{{ __('Product-Show') }}</div>
                    <img src="{{$product->image}}" class="mx-auto mt-2 card-img-top w-25 d-block rounded-circle " alt="...">
                 <div class="card-body">
                    <p class="card-text">{{$product->name}}</p>
                    <p class="card-text">{{$product->description}}</p>
                    <p class="card-text">Marca: {{$product->brand}}</p>
                    <p class="card-text">Price: {{$product->price}} €</p>
                    <p class="card-text">Stock {{$product->stock}}</p>
                 </div>

                <div class="card-body">
                    <label for="product">Añadir a la cesta</label>
                    <input type="number" id="stock" name="stock"
                    min="0" max="{{$product->stock}}">
                </div>

                <div class="col-lg-8 offset-lg-2">
                    <button type="submit" class="btn btn-warning">Comprar</button>
                </div>  
            </div> 
        </div>
    </div>
</div>
@endsection
