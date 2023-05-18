<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
        // Show Login Form
        public function login() {
            return view('users.login');
        }
}
