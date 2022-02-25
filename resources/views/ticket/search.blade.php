@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="row">
                <form action="{{route('home')}}" method="GET">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" name="search" class="form-control" placeholder="Buscar..." aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <input type="submit" class="btn btn-success" value="🔍"></input>
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">            
                <a href="{{ route('create.ticket')}}" class="btn-home btn btn-success">
                    <p>Crear Ticket</p><img src="{{asset('img/add.png')}}" alt="Crear" class="text-right ml-3">
                </a>
            </div>
            <div class="row mt-3">            
                <a href="{{ route('create.category')}}" class="btn-home btn btn-success">
                    <p>Crear Categoría</p><img src="{{asset('img/add.png')}}" alt="Crear" class="text-right ml-3">
                </a>
            </div>
        </div>

        <div class="col-md-9">
            <div class="card text-center">
                <div class="card-header mt-2">
                    <h4 class="title-pag">Resultados de: {{$data}}</h4>
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
                                        <?php $title = substr($ticket->tittle, 0, 31); 
                                            if (strlen($title) > 30) {
                                                $title = $title.'...';
                                            }
                                        ?>
                                        <h5>{{$title}}</h5>
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text mt-1 mb-0">{{$ticket->categories->name}}<hr></p>
                                        <?php $desc = substr($ticket->description, 0, 150); 
                                            if (strlen($desc) > 149) {
                                                $desc = $desc.'...';
                                            }
                                        ?>
                                        <h6 class="card-title">{{$desc}}</h6>
                                        <a href="{{route('get.ticket', ['id' => $ticket->id])}}" class="btn-ticket btn btn-primary">Ver más</a>
                                    </div>
                                    <div class="card-footer text-muted mt-2">
                                        <?php $date = substr($ticket->created_at, 0, 10); ?>
                                        {{$date}}
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
