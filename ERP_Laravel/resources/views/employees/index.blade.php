@extends('layouts.app')

@section('content')
<div class="container">
    @if ($message = Session::get('success'))
    <div class="mt-4 alert alert-success alert-dismissible fade show" role="alert">
        <p>{{ $message }}</p>

    </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="text-center card-header bg-warning">{{ __('Employees') }}</div>

                <div class="card-body d-flex justify-content-end">
                   <a href="{{ route('employees.create')}}" class="btn btn-secondary">Create new employee</a>
                </div>
            </div>
        </div>
    </div>
    <div class="mt-5 row">
        <div class="mx-auto col-md-10">
            <table class="table ">
                <thead class="bg-warning">
                  <tr class="">

                      <th>Name</th>
                      <th>Address</th>
                      <th>Email</th>
                      <th>Image</th>
                      <th class="text-center">Acciones</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($employees as $employee)
                    <tr class="">
                        <td>{{$employee->name}}</td>
                        <td>{{$employee->address}}</td>
                        <td>{{$employee->email}}</td>

                        <td>
                            <img src="{{$employee->image}}" width="30" alt="">
                        </td>
                        <td>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('employees.show',$employee->id)}}"><i class="far fa-eye fa-lg text-success"></i></a>
                                <a href="{{ route('employees.edit',$employee->id)}}"><i class="far fa-edit fa-lg text-secondary"></i></a>
                                <form action="{{ route('employees.destroy',$employee->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn"><i class="far fa-trash-alt fa-lg text-danger"></i></button>
                                </form>




                            </div>
                        </td>
                    </tr>
                    @endforeach

                </tbody>
              </table>
        </div>
    </div>
</div>
@endsection