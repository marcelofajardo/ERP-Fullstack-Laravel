@extends('layouts.app')

@section('content')
@include('layouts.carrousel')
<div class="container mt-5">
    <div class="mt-5 row">
        <div class="mx-auto col-md-8 ">
          @include('layouts.modals')       

        <div class="row">
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/circle-1.jpg')}}"  width="140" height="140">
            <h2>{{__('Our Shop')}}</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn  rgba-secondary-1-0 text-white" href="#" role="button">View details »</a></p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/circle-2.jpg')}}"  width="140" height="140">
            <h2>{{__('Products')}}</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn  rgba-secondary-1-2 text-white" href="#" role="button">View details »</a></p>
          </div>
          <div class="col-lg-4">
            <img class="rounded-circle" src="{{asset('images/circle-3.jpg')}}"  width="140" height="140">
            <h2>{{__('Oferts')}}</h2>
            <p>Donec sed odio dui. Etiam porta sem malesuada magna mollis euismod. Nullam id dolor id nibh ultricies vehicula ut id elit. Morbi leo risus, porta ac consectetur ac, vestibulum at eros. Praesent commodo cursus magna.</p>
            <p><a class="btn  rgba-secondary-1-1 text-white" href="#" role="button">View details »</a></p>
          </div>      
        </div>

      </div>

    </div>
</div>
@endsection
