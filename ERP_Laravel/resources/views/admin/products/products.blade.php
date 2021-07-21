@extends('layouts.app')
@section('content')
<style>
    .botonMenu {
        background-color: transparent;
        border: none;
    }
</style>
<div class="container">
    <!--
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Clients') }}</div>

                <div class="card-body d-flex justify-content-end">
                    <button class="btn btn-secondary" type="submit">Crear Cliente</button>
                </div>
            </div>
        </div>
    </div>
    -->
    <div class="mt-5 row">
        <div class="mx-auto col-md-10">
            <table class="table mt-5 bg-white">
                <thead class="bg-warning">
                    <tr class="">
                        <th>ID</th>
                        <th>{{__('Name')}}</th>
                        <th>{{__('Brand')}}</th>
                        <th>{{__('Description')}}</th>
                        <th>{{__('Price')}}</th>
                        <th>{{__('Image')}}</th>
                        <th>{{__('Sales')}}</th>
                        <th>{{__('Stock')}}</th>
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="">
                        <td>{{ $product->id }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->brand }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->price }}</td>
                        <td>
                            <img src="{{ $product->image }}" width="30" alt="">
                        </td>
                        @if ($product->sales)
                        <td>Disponible</td>
                        @else
                        <td>No disponible</td>
                        @endif
                        <td>{{ $product->stock }}</td>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <form method="GET" action="{{ route('product.show',  $product->id) }}">
                                    @csrf
                                    <button class="botonMenu" type="submit" href=""><i class="far fa-eye fa-lg text-success"></i></button>
                                </form>
                                <form method="GET" action="{{ route('product.edit',  $product->id) }}">
                                    @csrf
                                    <button class="botonMenu" type="submit" href=""><i class="far fa-edit fa-lg text-secondary"></i></button>
                                </form>
                                <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="botonMenu" type="submit" href=""><i class="fas fa-trash-alt fa-lg text-danger"></i></button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="row">
                <div class="mt-5 ml-3">
                    <a class="btn btn-secondary" href="{{ route('product.create') }}">Añadir producto</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection