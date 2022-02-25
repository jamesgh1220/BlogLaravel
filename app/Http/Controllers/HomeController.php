<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ticket;
use App\Category;

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
        $tickets = Ticket::all();
        $categories = Category::all();
        return view('home', [
            'tickets' => $tickets,
            'categories' => $categories
        ]);
    }

    public function sidebar() {
        $categories = Category::all();
        return view('includes.sidebar', [
            'categories' => $categories
        ]);
    }
}
