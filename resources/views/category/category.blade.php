@extends('layouts.app')

@section('content')
    @foreach ($tickets as $ticket)
        <?php echo $ticket->tittle ?>
    @endforeach
@endsection
