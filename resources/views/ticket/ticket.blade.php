@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('includes.sidebar')
        <div class="col-md-9">
        @include('includes.message')
            <div class="card-ppal card text-center">
                <div class="card-header mt-2">
                    <h4 class="title-pag">Detalle de la noticia</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="row mb-3">
                    <div class="card-ticket col-sm-10 mb-6 ml-6">
                        <div class="card mt-4">
                            <div class="card text-center">
                                <div class="card-header mt-1">
                                    <h5>{{$ticket->tittle}}</h5>
                                </div>
                                <div class="card-body mb-2">
                                    <p class="card-text mt-2 mb-2">{{$ticket->categories->name}}<hr></p>
                                    <h6 class="card-title ml-4 mr-4">{{$ticket->description}}</h6>
                                    <div class="text-white mt-2 mr-4 text-right">
                                        <?php $date = substr($ticket->created_at, 0, 10); ?>
                                            {{$date}}
                                    </div><hr>
                                </div>
                                <div class="card-body mt-2 mb-4">
                                    <a href="{{route('home')}}" class="btn-ticket btn btn-primary mb-3">Inicio</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection