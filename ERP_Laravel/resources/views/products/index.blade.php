@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>    
@endif
<div class="container">
    <h2>{{__("Our Products")}}</h2>
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
                          <form method="POST" action="{{ route('cart.store') }}">
                              @csrf
                              <input type="hidden" name="id" value="{{ $product->id }}"/>
                              <button type="submit" style="z-index: 1; position:relative;" class="btn btn-warning btn-lg btn-block shop-button"><i class="fas fa-shopping-cart"></i>&nbsp;{{__("Add to cart")}}</a>
                          </form>
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