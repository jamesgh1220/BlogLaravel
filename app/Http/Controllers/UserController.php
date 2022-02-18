<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function config() {
        return view('user.config');
    }

    public function edit(Request $request) {
        $user = \Auth::user();
        $id = $user->id;

        $validate = $this->validate($request, [
            'name' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$id,
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
