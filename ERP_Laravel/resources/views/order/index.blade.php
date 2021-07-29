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
        <div class="col col-5">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">{{ __('name') }}</th>
                    <th scope="col">{{ __('price') }}</th>
                    <th scope="col">{{ __('quantity') }}</th>
                    <th></th>             
                </tr>
            </thead>
            <tbody>
            @if (!Cart::isEmpty())
                @foreach (Cart::getContent() as $item)
                <tr>
                    <th scope="row">{{$item->name}}</th>
                    <td>{{ number_format($item->price,2) }} €</td>
                    <td>{{ number_format($item->quantity,0) }}</td>          
                    <td><img src="{{ $item->attributes->imgimg}}" class="img-fluid img-thumbnail" style="max-width: 100%;" alt="{{ $item->name}}"></td>                  
                </tr>
                @endforeach
            @endif
            </tbody>
        </table>
        </div>
    </div>
    <div class="row">
        <div class="col col-6">
            <table class="table">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">{{ __('quantity') }}</th>
                        <th scope="col">{{ __('Sub total') }}</th>
                        <th scope="col">{{ __('Total') }}</th>
                        <th scope="col">{{ __('Taxes') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if (!Cart::isEmpty())
                    <tr>
                        <td>{{ Cart::getTotalQuantity() }}</td>
                        <td>{{ number_format(Cart::getSubTotal(), 2) }} €</td>
                        <td>{{ number_format(Cart::getTotal(), 2) }} € </td>
                        <td colspan="2">
                            <table> 
                                <tr><th scope="col">{{ __('Condition') }}</th>
                                <th scope="col">{{ __('Value') }}</th>   
                                <th scope="col">{{ __('Subtotal') }}</th>  
                                </tr>
                                @foreach ($conditions as $condition)   
                                <tr>                             
                                    <td>                   
                                        {{ $condition->getName() }} 
                                        <td>
                                        {{ $condition->getValue() }}</td>
                                    </td> 
                                
                                    <td >{{ $condition->getCalculatedValue(Cart::getSubTotal())}}</td>
                                </tr>
                                @endforeach
                            
                            </table>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
                
        <div  class="col col-4" style="text-align:left;">
            <form action="{{ route('order.store') }}" method="POST">
                {{ csrf_field() }}
                @if (!Cart::isEmpty())
                    <label for="adress_id">{{ __('Shipping address')}}</label>

                    <select class="form-control" id="adress_id" name="adress_id">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                    <label for="comments">{{__('Comments')}}</label>

                    <textarea class="form-control" id="comments" name="comments" rows="3"></textarea>
                    <br>                   
                    <button class="btn btn-3 btn-md">{{ __('Payment Confirmation') }}</button>
                @else
                    <br>
                    <button class="btn btn-3 btn-md" disabled>{{ __('Payment Confirmation') }}</button>
                @endif

            </form>
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





