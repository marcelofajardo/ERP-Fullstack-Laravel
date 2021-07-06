@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center card-header bg-warning">{{ __('Edit employee') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('employees.update',$employee)}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $employee->name}}" id="name" type="text" class="form-control " name="name" >

                                @error('name')

                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email address') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $employee->email}}" id="email" type="email" class="form-control"s  name="email">

                                @error('email')
                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __(' Address') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $employee->address}}" id="address" type="text" class="form-control" name="address" >

                                @error('address')
                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cif_nif" class="col-md-4 col-form-label text-md-right">{{ __('CIF/NIF') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $employee->cif_nif}}" id="cif_nif" type="text" class="form-control"  name="cif_nif">

                                @error('cif_nif')
                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select name="type" id="type" class="form-control value="{{ $employee->type}}"  >
                                    <option value="employee">Employee</option>
                                </select>

                                @error('type')
                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="image" class="col-md-4 col-form-label text-md-right">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $employee->image}}" id="image" type="text" class="form-control" name="image">

                                @error('image')
                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $employee->password}}" id="password" type="password" class="form-control"  name="password">

                                @error('password')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dni" class="col-md-4 col-form-label text-md-right">{{ __('DNI') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $employee->dni}}" id="dni" type="text" class="form-control"  name="dni">

                                @error('dni')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="salary" class="col-md-4 col-form-label text-md-right">{{ __('Salary (Gross Annual)') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $employee->salary}}" id="salary" type="number" class="form-control"  name="salary">

                                @error('salary')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone" class="col-md-4 col-form-label text-md-right">{{ __('Phone') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $employee->phone}}" id="phone" type="text" class="form-control"  name="phone">

                                @error('phone')
                                <div class="text-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-0 form-group row">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-secondary">
                                    {{ __('Update') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection