<div class="col-md-3">
    <div class="row">
        <form action="{{ route('ticket.search') }}" method="get">
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