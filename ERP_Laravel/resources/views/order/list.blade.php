@extends('layouts.app')
@section('content')
@if (Session::has('success'))
    <div class="alert alert-success" role="alert">
        {{Session::get('success')}}
    </div>    
@endif

<div class="container">

    <h2>{{ __('Orders')}}</h2>
    <div class="row">

        <div class="col col-8">
            <table class="table">
                <thead class="thead-dark">

                    <tr>
                        <th scope="col">{{ __('Date') }}</th>
                        <th scope="col">{{ __('quantity') }}</th>
                        <th scope="col">{{ __('Payment') }}</th>
                        <th scope="col">{{ __('Adress') }}</th>
                        <th scope="col">{{ __('Gross total') }}</th>
                        <th scope="col">{{ __('Net total') }}</th>
                        <th scope="col">{{ __('Comments') }}</th>
                        <th></th>
            
                    </tr>
                </thead>
                <tbody>        
                
                @foreach ($orders as $order)
            
                    <tr>
                        <th scope="row">{{$order->date}}</th>
                        <td>{{ number_format($order->quantity,0) }}</td>          
                        <td>{{$order->payment_id}}</td>
                        <td>{{$order->adress_id}}</td>
                        <td>{{ number_format($order->gross_total,2)}}</td>
                        <td>{{ number_format($order->net_total,2)}}</td>
                        <td>{{$order->comments}}</td>
                        <td><a href="{{route('order.show',$order->id)}}" class="fas fa-search-plus"></a></td>

                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection