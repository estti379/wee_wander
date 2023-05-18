<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Show Login Form
    public function login() {
        if( Auth::check() ){
            //An user is already logged in
            return redirect('/')->with('message', 'You are already logged in!');
        }
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

    // Logout User
    public function logout(Request $request) {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been logged out!');

    }

    // Show user detail page
    public function show($id) {
        $userDetails = User::find($id);

        $isOwner = $this->checkIfPageOwner($id);

        return view('users.show', [
            "userDetails" => $userDetails,
            "isOwner" => $isOwner,
        ]);
    }





    /**
     * Helper functions!
     */

     private function checkIfPageOwner($id) {
        if( !Auth::check() ){
            //No user is logged in
            $isOwner = false;
        } else{
            //an user is logged in
            if(Auth::user()->id != $id){
                $isOwner = false;
            } else {
                $isOwner = true;
            }
        }

        return $isOwner;
     }
}
