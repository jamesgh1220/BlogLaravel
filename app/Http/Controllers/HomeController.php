<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->input('search');
        $tickets = Ticket::all();
        $search = false;
        if (empty($tickets)) {
            $tickets = Ticket::where('tittle', 'LIKE', "%$data%")->get();
            $search = true;
        }
        return view('home', [
            'tickets' => $tickets,
            'data' => $data,
            'search' => $search
        ]);
    }
}
