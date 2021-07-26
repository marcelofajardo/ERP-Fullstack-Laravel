@extends('layouts.app')
@section('content')
    <div class="container" style="margin-top: 80px">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">{{ __('home') }}</a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.publicIndex') }}">{{ __('products') }}</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ __('cart') }}</li>
            </ol>
        </nav>
        @if(session()->has('success_msg'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session()->get('success_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('close') }}">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(session()->has('alert_msg'))
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {{ session()->get('alert_msg') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('close') }}">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
        @endif
        @if(count($errors) > 0)
            @foreach($errors0>all() as $error)
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ $error }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="{{ __('close') }}">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endforeach
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <br>
                @if(\Cart::getTotalQuantity()>0)
                    <h4>{{ \Cart::getTotalQuantity()}} {{ __('Cart products') }}</h4><br>
                @else
                    <h4>{{ __('Cart no products') }}</h4><br>
                    <a href="{{ route('product.publicIndex') }}" class="btn btn-dark"> {{ __('Continue shopping') }}</a>
                @endif

                @foreach($cartCollection as $item)
                    <div class="row">
                        <div class="col-lg-3">
                            <img src="{{ $item->attributes->imgimg }}" class="img-thumbnail" width="200" height="200">
                        </div>
                        <div class="col-lg-5">
                            <p>
                                <b><a href="/products/{{ $item->id }}">{{ $item->name }}</a></b><br>
                                <b>{{ __('price') }}: </b>{{ number_format($item->price,2) }} €<br>
                                <b>{{ __('Sub total') }}: </b>{{ number_format(\Cart::get($item->id)->getPriceSum(),2) }} €<br>
                                {{--  <b>{{ __('with_discount') }}: </b>{{ number_format(\Cart::get($item->id)->getPriceSumWithConditions(),2) }} --}}
                            </p>
                        </div>
                        <div class="col-lg-4">
                            <div class="row">
                                <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" value="{{ $item->id }}" id="id" name="id">
                                    <button class="btn btn-dark btn-sm" style="margin-right: 10px;"><i class="fa fa-trash"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <hr>
                @endforeach
                @if(count($cartCollection)>0)
                    <form action="{{ route('cart.delete') }}" method="POST">
                        {{ csrf_field() }}
                        <button class="btn btn-secondary btn-md">{{ __('Action clear') }}</button>
                    </form>
                @endif
            </div>
            @if(count($cartCollection)>0)
                <div class="col-lg-5">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><b>{{ __('total') }}: </b>{{ number_format(\Cart::getTotal(),2) }} €</li>
                        </ul>
                    </div>
                    <br><a href="{{ route('product.publicIndex') }}" class="btn btn-dark">{{ __('Continue shopping') }}</a>
                    <a href="#" class="btn btn-success">{{ __('Proceed checkout') }}</a>
                </div>
            @endif
        </div>
        <br><br>
    </div>
@endsection