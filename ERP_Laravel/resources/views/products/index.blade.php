@extends('layouts.app')

@section('content')

<div class="container">
    <h2>Our products</h2>
    <div class="mt-5 row">
        
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
          @foreach ($products as $product)
          <div class="card  ">
            <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
              <img src="{{ $product->image }}" class="img-fluid" />
              <a href="#!">
                <div class="mask" style="background-color: rgba(251, 251, 251, 0.15)"></div>
              </a>
            </div>
            
            <div class="card-body">
              <h4 class="card-title">{{ $product->name }}</h4>
              <h5 class="card-subtitle">{{ $product->brand}}</h5>
              <p class="card-text">
                {{ $product->description}}
              </p>
            
              <button type="button" class="btn btn-primary">Button</button>
            </div>
            <div class="card-footer">2 days ago</div>
          </div>
        @endforeach
      </div>
        
    </div>
</div>

@endsection