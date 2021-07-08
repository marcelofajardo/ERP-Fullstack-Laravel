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
                        <button type="submit" style="z-index: 1; position:relative;" class="btn btn-warning btn-lg btn-block shop-button"><i class="fas fa-shopping-cart"></i>&nbsp;{{__("cart.action_add")}}</a>
                    </form>
                </div>
                <div class="card-body">
                    <a class="btn btn-info btn-lg btn-block" href="{{ route('cart.index', 0) }}" data-toggle="tooltip" data-placement="bottom" title="{{ __('cart.show_cart') }}"><i class="fas fa-shopping-cart"></i> {{ __('cart.show_cart') }}</a>
                </div>  
                <div class="card-body">
                    <button type="submit" class="btn btn-warning">Comprar</button>
                </div>
                
            </div> 
        </div>
    </div>
</div>
@endsection
