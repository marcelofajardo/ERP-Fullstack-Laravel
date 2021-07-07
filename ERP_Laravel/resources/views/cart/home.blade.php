@extends('layouts.app')
@section('content')
<div class="container">
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th sc ope="col">#ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Precio</th>
                <th scope="col">Cantidad</th>
                <th scope="col">Atributos</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
        @if (!Cart::isEmpty())
            @foreach (Cart::getContent() as $item)
            <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->name}}</td>
                <td>{{ number_format($item->price,2) }} €</td>
                <td>{{ number_format($item->quantity,0) }}</td>
                <td>
                    @foreach ($item->attributes as $key => $attribute)
                        {{$key}}: {{$attribute}}.
                    @endforeach
                </td>
                <th scope="row">
                    <form method="POST" action="{{route('cart.destroy',$item->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit">Eliminar</button>
                    </form>
                </th>            
            </tr>
            @endforeach
        @endif
        </tbody>
    </table>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">Cantidad</th>
                <th scope="col">Sub Total</th>
                <th scope="col">Total</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{Cart::getTotalQuantity()}}</th>
                <th scope="row">{{ number_format(Cart::getSubTotal(), 2) }} €</th>
                <th scope="row">{{ number_format(Cart::getTotal(), 2) }} € </th>
            </tr>
        </tbody>
    </table>
    <div class="container">
        <div class="row">
            <div class="col" style="text-align:right;">
                <form method="GET" action="{{route('product.index')}}">
                    @csrf
                    <button class="btn btn-primary" type="submit" href="">Volver a Productos</button>
                </form>            
            </div>
            <div class="col" style="text-align:left;">
                <form method="GET" action="{{ url('/') }}">
                    @csrf
                    <button class="btn btn-primary" type="submit" href="">Volver a Home</button>
                </form>
            </div>
        </div>    
    </div>
</div>
@endsection