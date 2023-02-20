<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // Show form for registration
    public function create(){
        return view('users.register');
    }
}
