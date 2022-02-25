@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('includes.sidebar')
        <div class="col-md-9">
            <div class="card-ppal card">
                <div class="card-header mt-2 text-center">
                    <h4>Crear Categoría</h4>
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
                        <div class="form group row mt-2 pl-5 mb-3">
                            <div class="col-md-6 offset-md-3">
                                <input type="submit" class="btn-form btn btn-primary" value="Agregar">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection