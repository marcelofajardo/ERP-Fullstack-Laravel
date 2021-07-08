@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>    
@endif
<div class="container">
    <div class="row">
        <div class="col-1">
            <h3>{{ __('cart.cart') }}</h3>
        </div>
        <div class="col-10">
            <form method="POST" action="{{ route('cart.delete') }}">
                @csrf
                <button class="btn btn-primary" type="submit" href="">{{ __('cart.action_clear') }}</button>
            </form>
        </div>
    </div>
    <br/>
    <table class="table">
        <thead class="thead-dark">
            <tr>
                <th scope="col">{{ __('cart.id') }}</th>
                <th scope="col">{{ __('cart.name') }}</th>
                <th scope="col">{{ __('cart.price') }}</th>
                <th scope="col">{{ __('cart.quantity') }}</th>
                <th scope="col">{{ __('cart.attributes') }}</th>
                <th scope="col">{{ __('cart.action') }}</th>
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
                        {{ __('cart.'.$key) }}: {{$attribute}}.
                    @endforeach
                </td>
                <th scope="row">
                    <form method="POST" action="{{route('cart.destroy',$item->id)}}">
                        @method('DELETE')
                        @csrf
                        <button type="submit">{{ __('cart.action_delete') }}</button>
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
                <th scope="col">{{ __('cart.quantity') }}</th>
                <th scope="col">{{ __('cart.sub_total') }}</th>
                <th scope="col">{{ __('cart.total') }}</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">{{ Cart::getTotalQuantity() }}</th>
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
                    <button class="btn btn-primary" type="submit" href="">{{ __('cart.back_product') }}</button>
                </form>            
            </div>
            <div class="col" style="text-align:left;">
                <form method="GET" action="{{ url('/') }}">
                    @csrf
                    <button class="btn btn-primary" type="submit" href="">{{ __('cart.back_home') }}</button>
                </form>
            </div>
        </div>    
    </div>
</div>
@endsection