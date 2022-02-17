<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create() {
        return view('category.create');
    }

    public function save(Request $request) {
        $validate = $this->validate($request, [
            'name' => 'string|required'
        ]);

        $name = $request->input('name');
        $category = new Category();
        $category->name = $name;
        $category->save();
        return redirect()->route('home')->with([
            'message' => 'La categoría ha sido creada.'
        ]);
    }

    public function index()
    {
        
        $categories = DB::table('categories')
                ->orderBy('id', 'desc')
                ->get();
        return view('ticket.create', [
            'categories' => $categories
        ]);
        
    }
}