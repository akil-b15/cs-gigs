<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Show form for registration
    public function create(){
        return view('users.register');
    }

    // store new user
    public function store(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required|confirmed|min:6'
        ]);

        // Hash password
        $formFields['password'] = bcrypt($formFields['password']);

        // Create new user
        $user = User::create($formFields);

        // LOGIN
        auth()->login($user);

        return redirect('/')->with('message', 'User created and logged successfully');
    }

    // LOGOUT
    public function logout(Request $request){
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('message', 'You have been Logged Out');

    }

    // Show Login form
    public function login(){
        return view('users.login');
    }
}
