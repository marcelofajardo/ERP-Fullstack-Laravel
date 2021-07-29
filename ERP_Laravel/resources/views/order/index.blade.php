
{{Cart::getContent()}}
<form action="{{ route('order.store') }}" method="POST">
    {{ csrf_field() }}
    <button class="btn btn-secondary btn-md">{{ __('Payment') }}</button>
</form>

