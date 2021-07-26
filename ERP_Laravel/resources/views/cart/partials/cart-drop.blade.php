@if(count(\Cart::getContent()) > 0)
    @foreach(\Cart::getContent() as $item)
        <li class="list-group-item">
            <div class="row">
                <div class="col-lg-3">
                    <img src="{{ $item->attributes->imgimg }}"
                         style="width: 50px; height: 50px;"
                    >
                </div>
                <div class="col-lg-6">
                    <b>{{$item->name}}</b>
                    <br><small>{{ __('qty') }}: {{$item->quantity}}</small>
                </div>
                <div class="col-lg-3">
                    <p>{{ number_format(Cart::get($item->id)->getPriceSum(),2) }} €</p>
                </div>
                <hr>
            </div>
        </li>
    @endforeach
    <br>
    <li class="list-group-item">
        <div class="row">
            <div class="col-lg-10">
                <b>{{ __('total') }}: </b>{{ number_format(\Cart::getTotal(),2) }} €
            </div>
            <div class="col-lg-2">
                <form action="{{ route('cart.delete') }}" method="POST">
                    {{ csrf_field() }}
                    <button class="btn btn-secondary btn-sm"><i class="fa fa-trash"></i></button>
                </form>
            </div>
        </div>
    </li>
    <br>
    <div class="row" style="margin: 0px;">
        <a class="btn btn-dark btn-sm btn-block" href="{{ route('cart.index') }}">
            {{ __('cart') }} <i class="fa fa-arrow-right"></i>
        </a>
        <a class="btn btn-dark btn-sm btn-block" href="">
            {{ __('checkout') }} <i class="fa fa-arrow-right"></i>
        </a>
    </div>
@else
    <li class="list-group-item">{{ __('Cart empty') }}</li>
@endif