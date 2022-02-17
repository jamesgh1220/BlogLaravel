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
        @include('includes.message')
            <div class="card">
                <div class="card-header">Últimas publicaciones</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                </div>
                
            </div>
        </div>
    </div>
    
</div>
@endsection
