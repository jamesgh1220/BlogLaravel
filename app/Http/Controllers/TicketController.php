<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Category;

class TicketController extends Controller
{
    public function __construct()
    {
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
            'message' => 'El ticket ha sido creado correctamente.'
        ]);


        
    }
}
