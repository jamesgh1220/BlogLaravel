<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }

    public function config() {
        $categories = Category::all();
        return view('user.config', [
            'categories' => $categories
        ]);
    }

    public function edit(Request $request) {
        $user = \Auth::user();
        $id = $user->id;

        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,/**Comprobando si el email coincide con el id de este objeto */
        ]);

        $name = $request->input('name');
        $lastName = $request->input('lastName');
        $email = $request->input('email');

        $user->name = $name;
        $user->lastName = $lastName;
        $user->email = $email;
        $user->update();
        return redirect()->route('home')
                        ->with(['message' => 'Usuario actualizado correctamente']);
    }
}
