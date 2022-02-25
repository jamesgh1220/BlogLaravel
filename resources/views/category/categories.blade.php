@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('includes.sidebar')
        <div class="col-md-9">
        @include('includes.message')
            <div class="card-ppal card text-center">
                <div class="card-header mt-2">
                    <h4 class="title-pag">Todas las categorias</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="row mb-3">
                    @foreach ($categories as $category)
                        <div class="card-ticket col-sm-5 mb-6">
                            <div class="card mt-4">
                                <div class="card text-center">
                                    <div class="card-header mt-1">
                                        <h5>{{$category->name}}</h5>
                                    </div>
                                    <div class="card-body mt-2 mb-2">
                                        <a href="{{route('ticket.category', ['id' => $category->id])}}" class="btn-ticket btn btn-primary mb-2">Ver más</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

@endsection