@extends('layouts.app')

@section('content')

<div class="container">
    <h2>{{__("publicProducts.Our Products")}}</h2>
    <div class="mt-5 row">
        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach ($products as $product)
          
            <div class="card my-2 px-1">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="{{ $product->image }}" class="img-fluid" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
                </a>
              </div>
              
              <div class="card-body d-flex flex-column">
                <h4 class="card-title">{{ $product->name }}</h4>
                <h5 class="card-subtitle text-capitalize">{{ $product->brand}}</h5>
                <p class="card-text">
                  {{ $product->description}}
                </p>
                <div class="mb-0 mt-auto">
                  <a class="stretched-link" href="{{ route('product.showPublic',  $product->id) }}"></a>
                  <a type="button" class="btn btn-warning btn-lg btn-block shop-button"  href="#"><i class="fas fa-shopping-cart"></i>&nbsp;{{__("publicProducts.Add to cart")}}</a>
                </div>
              </div>
              <div class="card-footer">
                <p class="text-right">{{ $product->price }} €</p>
              </div>
            </div>

        @endforeach
      </div>
        
    </div>
</div>

@endsection