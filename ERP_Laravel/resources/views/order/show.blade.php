@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>    
@endif
<div class="container">
    <h2>{{ __('Order')}}</h2>
  
    <div class="row">
        <div class="col col-8">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">{{ __('Date') }}</th>
                    <th scope="col">{{ __('price') }}</th>
                    <th scope="col">{{ __('Sub total') }}</th>
                    <th scope="col">{{ __('Total') }}</th>
                    <th scope="col">{{ __('Address') }}</th>
                    <th scope="col">{{ __('Comments') }}</th>
                    <th></th>             
                </tr>
            </thead>
            <tbody>           
                <tr>
                    <th scope="row">{{$order->date}}</th>
                    <td>{{ number_format($order->price,2) }} €</td>
                    <td>{{ number_format($order->gross_total, 2) }} €</td>
                        <td>{{ number_format($order->net_total, 2) }} € </td>
                        
                        <td>{{$order->adress_id}}</td>
                        <td>{{$order->comments}}</td>
                </tr>        
            </tbody>
        </table>
        </div>
    </div>
        
    
    <div class="row">
        <div class="col col-6">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ __('Product') }}</th>
                        <th scope="col">{{ __('Quantity') }}</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order_products as $order_product)
                    <tr>         
                        <td>{{$order_product->product_id}}</td>
                     
                        <td>{{$order_product->quantity}}</td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>          
    </div>

    <br>

    <div class="container">
        <div class="row">
            <div class="col" style="text-align:right;">
                <form method="GET" action="{{route('product.publicIndex')}}">
                    @csrf
                    <button class="btn btn-1" type="submit" href="">{{ __('Back product') }}</button>
                </form>            
            </div>
            <div class="col" style="text-align:left;">
                <form method="GET" action="{{ url('/') }}">
                    @csrf
                    <button class="btn btn-1" type="submit" href="">{{ __('Back home') }}</button>
                </form>
            </div>
    
        </div>    
    </div>
</div>

@endsection

