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
    <div class="row mt-3">
        <button class="btn-home btn-success" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <p class="mt-1">Categorías</p><img src="{{asset('img/add.png')}}" alt="Crear" class="text-right ml-3 mt-1">
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            @if(!empty($categories))
                @foreach($categories as $category)
                    <a href="{{route('ticket.category', ['id' => $category->id])}}" value="{{$category->id}}">{{$category->name}}</a><br>
                @endforeach
            @endif
        </div>
    </div>
</div>