@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-5 row">
        <div class="mx-auto col-md-10">
            <div class="card">
                <div class="card-header bg-warning">
                    {{__('Record')}}: {{ $product->id }}
                </div>
                <div class="d-flex justify-content-center">
                    <img class="card-img" src="{{ $product->image }}" alt="Card image cap" style="width:300px;">
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>{{__('Brand')}}: </strong>{{ $product->brand }}</li>
                    <li class="list-group-item"><strong>{{('Stock'))}}: </strong>{{ $product->stock }}</li>
                    @if($product->sales)
                    <li class="list-group-item text-success">{{__('Shipping available')}}</li>
                    @else
                    <li class="list-group-item text-danger">{{__('Shipping not available')}}</li>
                    @endif
                </ul>
                <div class="card-body">
                    <div class="btn-group" role="group" aria-label="">
                        <form method="GET" action="{{ route('product.edit',  $product->id) }}">                        
                            @csrf
                            <button class="btn btn-primary" type="submit" href="">{{__('Edit')}}</button>
                        </form>
                        &nbsp;
                        <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" href="">{{__('Delete')}}</button>
                        </form>
                        &nbsp;
                        <form method="GET" action="{{route('product.index')}}">
                            @csrf
                            <button class="btn btn-secondary" type="submit" href="">{{__('Go back')}}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection