<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('ticket.create');
    }

    public function save(Request $request) {
        $validate = $this->validate($request, [
            'tittle' => 'string|required',
            'description' => 'string|required'
        ]);

        $user = \Auth::user();
        $tittle = $request->input('tittle');
        $description = $request->input('description');
        
    }
}
