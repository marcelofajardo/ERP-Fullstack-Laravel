@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mt-5 row">
        <div class="mx-auto col-md-10">
            <div class="card">
                <div class="card-header bg-warning">
                    Registro: {{ $product->id }}
                </div>
                <div class="d-flex justify-content-center">
                    <img class="card-img" src="{{ $product->image }}" alt="Card image cap" style="width:300px;">
                </div>
                <div class="card-body">
                    <h4 class="card-title">{{ $product->name }}</h4>
                    <p class="card-text">{{ $product->description }}</p>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Marca: </strong>{{ $product->brand }}</li>
                    <li class="list-group-item"><strong>Stock: </strong>{{ $product->stock }}</li>
                    @if($product->sales)
                    <li class="list-group-item text-success">Envío disponible</li>
                    @else
                    <li class="list-group-item text-danger">Envío no disponible</li>
                    @endif
                </ul>
                <div class="card-body">
                    <div class="btn-group" role="group" aria-label="">
                        <form method="GET" action="{{ route('product.edit',  $product->id) }}">                        
                            @csrf
                            <button class="btn btn-primary" type="submit" href="">Editar</button>
                        </form>
                        &nbsp;
                        <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger" type="submit" href="">Eliminar</button>
                        </form>
                        &nbsp;
                        <form method="GET" action="{{route('product.index')}}">
                            @csrf
                            <button class="btn btn-secondary" type="submit" href="">Volver</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection