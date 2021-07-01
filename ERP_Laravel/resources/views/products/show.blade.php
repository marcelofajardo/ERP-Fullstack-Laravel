@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center  card">
                <div class="card-header bg-warning">{{ __('Product-Show') }}</div>
                <img src="{{$product->image}}" class="mx-auto mt-2 card-img-top w-25 d-block rounded-circle " alt="...">
                 <div class="card-body">
                    <h5 class="card-title">{{$product->name}}</h5>
                    <p class="card-text">{{$product->brand}}</p>
                    <p class="card-text">{{$product->descripcion}}</p>
                    <p class="card-text">Price: {{$product->price}} €</p>
                    <p class="card-text">Stock {{$product->stock}}</p>
                 </div>

            </div>
        </div>
    </div>
</div>
@endsection
