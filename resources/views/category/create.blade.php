@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row mt-4">
        <div class="col-md-3">
            <a href="" class="btn btn-success">Agregar</a>
        </div>
        <div class="col-md-9">
            <div class="card">
                <div class="card-header">
                    <h4 class="title-pag">Crear Categoría</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('save.category') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="name" class="col-sm-4 mt-3 col-form-label text-md-right">Nombre</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="mt-3 form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form group row mt-5 pl-5 ml-5 mb-3">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn btn-primary" value="Agregar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection