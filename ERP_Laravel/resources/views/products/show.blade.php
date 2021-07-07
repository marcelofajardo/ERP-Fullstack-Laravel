@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>    
@endif
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
                    <form method="POST" action="{{ route('cart.store') }}">
                        @csrf
                        <input type="hidden" name="id" value="{{ $product->id }}"/>
                        {{ __('cart.quantity') }} <input type="number" name="quantity" min="0" max="{{$product->stock}}"/>
                        <br/><br/>
                        <button class="btn btn-success" type="submit" href="" data-toggle="tooltip" data-placement="top" title="{{ __('cart.action_add') }}"><i class="fas fa-cart-plus"></i> {{ __('cart.action_add') }}</button>
                    </form>
                </div>
                <div>
                    <a class="btn btn-info" href="{{ route('cart.index', 0) }}" data-toggle="tooltip" data-placement="bottom" title="{{ __('cart.show_cart') }}"><i class="fas fa-shopping-cart"></i> {{ __('cart.show_cart') }}</a>
                </div>  
                <br/>
                <div class="col-lg-8 offset-lg-2">
                    <button type="submit" class="btn btn-warning">Comprar</button>
                </div>
            </div> 
        </div>
    </div>
</div>
@endsection
