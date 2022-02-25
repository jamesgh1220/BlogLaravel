@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
    @include('includes.sidebar')
        <div class="col-md-9">
            <div class="card-ppal card text-center">
                <div class="card-header mt-2">
                    <h4 class="title-pag">Noticias sobre: {{$data}}</h4>
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
                                        <a href="{{route('get.ticket', ['id' => $ticket->id])}}" class="btn-ticket btn btn-primary mb-2">Ver más</a>
                                    </div>
                                    <div class="card-footer text-white">
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
