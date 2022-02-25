<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Category;

class TicketController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function create() {
        $categories = Category::all();
        return view('ticket.create', [
            'categories' => $categories
        ]);
    }

    public function save(Request $request) {
        $validate = $this->validate($request, [
            'tittle' => 'string|required',
            'description' => 'string|required'
        ]);

        $user = \Auth::user();
        $tittle = $request->input('tittle');
        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $ticket = new Ticket();
        $ticket->user_id = $user->id;
        $ticket->category_id = (int)$category_id;
        $ticket->tittle = $tittle;
        $ticket->description = $description;
        
        $save = $ticket->save();
        return redirect()->route('home')->with([
            'message' => 'La noticia ha sido creada correctamente.'
        ]);


        
    }

    public function getTicket($id) {
        $ticket = Ticket::find($id);
        $categories = Category::all();
        return view('ticket.ticket', [
            'ticket' => $ticket,
            'categories' => $categories
        ]);
    }

    public function ticketByUser() {
        $user = \Auth::user();
        $tickets = Ticket::where('user_id', $user->id)->get();
        $categories = Category::all();
        return view('ticket.userTicket', [
            'tickets' => $tickets,
            'categories' => $categories
        ]);
    }

    public function ticketByCategory($id) {
        //Captura categoria
        $category = Category::find($id);
        $categories = Category::all();
        $tickets = Ticket::where('category_id', $id)->get();
        return view('category.category', [
            'tickets' => $tickets,
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function delete($id) {
        $user = \Auth::user();
        $ticket = Ticket::find($id);
        if ($user && ($ticket->user_id == $user->id )) {
            $ticket->delete();
            return redirect()->route('ticket.user')
                        ->with([
                            'message' => 'Noticia eliminada correctamente']);
        }else{
            return redirect()->route('ticket.user')
                        ->with([
                            'message' => 'La noticia no se ha eliminado']);
        }
    }

    public function search(Request $request){
        $validate = $this->validate($request, [
            'search' => 'string|required',
        ]);

        $data = $request->input('search');
        $tickets = Ticket::where('tittle', 'LIKE', "%$data%")->get();
        $categories = Category::all();
        return view('ticket.search', [
            'tickets' => $tickets,
            'data' => $data,
            'categories' => $categories
        ]);
    }

    public function config($id) {
        $ticket = Ticket::find($id);
        $categories = Category::all();
        return view('ticket.editTicket', [
            'ticket' => $ticket,
            'categories' => $categories
        ]);
        return view('ticket.editTicket');
    }

    public function edit(Request $request, $id){
        $ticket = Ticket::find($id);
        $validate = $this->validate($request, [
            'tittle' => 'string|required',
            'description' => 'string|required'
        ]);
        $tittle = $request->input('tittle');
        $description = $request->input('description');
        $category_id = $request->input('category_id');
        $ticket->tittle = $tittle;
        $ticket->description = $description;
        $ticket->category_id = $category_id;
        $ticket->update();
        return redirect()->route('ticket.user')
                        ->with(['message' => 'Noticia actualizada correctamente']);;
    }
}
