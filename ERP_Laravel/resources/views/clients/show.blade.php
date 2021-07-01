@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center  card">
                <div class="card-header bg-warning">{{ __('Client-Show') }}</div>
                <img src="{{$user->image}}" class="mx-auto mt-2 card-img-top w-25 d-block rounded-circle " alt="...">
                 <div class="card-body">
                    <h5 class="card-title">{{$user->name}}</h5>
                    <p class="card-text">{{$user->address}}</p>
                    <p class="card-text">{{$user->email}}</p>
                    <p class="card-text">{{$user->type}}</p>
                    <p class="card-text">{{$user->cif_nif}}</p>
                    <p class="card-text">{{$user->id}}</p>
                 </div>

            </div>
        </div>
    </div>
</div>
@endsection
