@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="text-center card-header bg-warning">{{ __('Clients-Edit') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('clients.update',$user)}}">
                        @csrf
                        @method('PUT')

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $user->name}}" id="name" type="text" class="form-control " name="name" >

                                @error('name')

                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $user->email}}" id="email" type="email" class="form-control"s  name="email">

                                @error('email')
                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="address" class="col-md-4 col-form-label text-md-right">{{ __(' Address') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $user->address}}" id="address" type="text" class="form-control" name="address" >

                                @error('address')
                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="cif_nif" class="col-md-4 col-form-label text-md-right">{{ __('Cif-Nif') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $user->cif_nif}}" id="cif_nif" type="text" class="form-control"  name="cif_nif">

                                @error('cif_nif')
                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="type" class="col-md-4 col-form-label text-md-right">{{ __('Type') }}</label>

                            <div class="col-md-6">
                                <select name="type" id="type" class="form-control value="{{ $user->type}}"  >
                                    <option value="">Choose..</option>
                                    <option value="client">Client</option>
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
                                <input value="{{ $user->image}}" id="image" type="text" class="form-control" name="image">

                                @error('image')
                                <div class="text-danger">{{ $message }}</div>

                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input value="{{ $user->password}}" id="password" type="password" class="form-control"  name="password">

                                @error('password')
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
