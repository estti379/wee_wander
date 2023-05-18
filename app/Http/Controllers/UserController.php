<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show Login Form
    public function login() {
        return view('users.login');
    }

    // Authenticate User
    public function authenticate(Request $request) {
        $formFields = $request->validate([
            'userName' => 'required',
            'password' => 'required'
        ]);

        if(auth()->attempt($formFields)) {
            $request->session()->regenerate();
            //TODO: redirect to better page!
            return redirect('/')->with('message', 'You are now logged in!');
        }

        return back()->withErrors(['userName' => 'Invalid Credentials'])->onlyInput('userName');
    }
}
