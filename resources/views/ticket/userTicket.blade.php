@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('includes.sidebar')
        <div class="col-md-9">
        @include('includes.message')
            <div class="card text-center">
                <div class="card-header mt-2">
                    <h4>Mis Tickets</h4>
                </div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="row mb-3">
                    @foreach ($tickets as $ticket)
                        <div class="card-ticket col-sm-5 mb-6">
                            <div class="card mt-4">
                                <div class="card text-center">
                                    <div class="card-header mt-1">
                                        <h5>{{$ticket->tittle}}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text mt-2 mb-2">{{$ticket->categories->name}}<hr></p>
                                        <h6 class="card-title mt-3">{{$ticket->description}}</h6>
                                        <a href="{{route('get.ticket', ['id' => $ticket->id])}}" class="btn-ticket btn btn-primary">Ver más</a>
                                    </div>
                                    <div class="card-footer text-muted mt-2 mb-0">
                                        <div class="text-right">
                                            <?php $date = substr($ticket->created_at, 0, 10); ?>
                                            {{$date}}
                                        </div>
                                        <div class="options text-left">
                                            <a class="btn-delete" href="{{route('ticket.delete', ['id' => $ticket->id])}}"><img src="{{asset('img/trash.png')}}" alt="Eliminar"></a>
                                            <a class="btn-edit ml-4" href="{{route('ticket.config', ['id' => $ticket->id])}}"><img src="{{asset('img/settings.png')}}" alt="Editar"></a>
                                        </div>
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