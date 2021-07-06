@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="text-center  card">
                <div class="card-header bg-warning">{{ __('Employee Info') }}</div>
                 <div class="card-body">
                    <p class="card-text">{{$employee->id}}</p>
                    <h5 class="card-title">{{$employee->name}}</h5>
                    <p class="card-text">Type: {{$employee->type}}</p>
                    <p class="card-text">{{$employee->dni}}</p>
                    <p class="card-text">{{$employee->address}}</p>
                    <p class="card-text">{{$employee->email}}</p>
                    <p class="card-text">CIF/NIF: {{$employee->cif_nif}}</p>              
                    <p class="card-text">Phone: {{$employee->phone}}</p>
                    <p class="card-text">Salary (Gross Annual): {{$employee->salary}}</p>
                 </div>

            </div>
        </div>
    </div>
</div>
@endsection