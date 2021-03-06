@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('includes.sidebar')
        <div class="col-md-9">
            <div class="card-ppal card">
                <div class="card-header mt-2 text-center">
                    <h4>Crear Noticia</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{route('save.ticket')}}" class="mt-3">
                        @csrf
                        <div class="form-group row">
                            <label for="tittle" class="col-sm-4 col-form-label text-md-right">Titulo</label>
                            <div class="col-md-6">
                                <input id="tittle" type="text" class="form-control{{ $errors->has('tittle') ? ' is-invalid' : '' }}" placelholder="Titulo" name="tittle" value="{{ old('tittle') }}" required autofocus>
                                @if ($errors->has('tittle'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tittle') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="description" class="col-sm-4 col-form-label text-md-right">Descripción</label>
                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>
                                @if ($errors->has('description'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-4 col-form-label text-md-right">Categoría</label>
                                <select name="category_id" class="form-select form-select-lg mb-1 ml-3" aria-label=".form-select-lg example">
                                    @if(!empty($categories))
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</p></option>
                                        @endforeach
                                    @endif
                                </select>
                                @if ($errors->has('category'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('category') }}</strong>
                                    </span>
                                @endif
                            
                        </div>
                        <div class="form group row mt2 pl-5 mb-3">
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