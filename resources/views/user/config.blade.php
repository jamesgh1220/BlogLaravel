@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="row">            
                <a href="{{ route('create.ticket')}}" class="btn btn-success">Agregar Ticket</a>
            </div>
            <div class="row mt-3">            
                <a href="{{ route('create.category')}}" class="btn btn-success">Crear Categoría</a>
            </div>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Editar Perfil</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('user.edit') }}" aria-label="{{ __('Register') }}" class="mt-4">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">Nombres</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{Auth::user()->name}}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="lastName" class="col-md-4 col-form-label text-md-right">Apellidos</label>

                            <div class="col-md-6">
                                <input id="lastName" type="text" class="form-control{{ $errors->has('lastName') ? ' is-invalid' : '' }}" name="lastName" value="{{Auth::user()->lastName}}" required autofocus>

                                @if ($errors->has('lastName'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('lastName') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{Auth::user()->email}}" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Editar
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
