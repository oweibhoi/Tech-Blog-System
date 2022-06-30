<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    function index(){
        return view('registration');
    }

    function store(){
        $attributes = request()->validate([
            'name' => 'required|max:255',
            'username' => 'required|unique:users,username|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|max:255|min:4'
        ]);

        $user = User::create($attributes);
        auth()->login($user);
        return redirect('/')->with('success', 'Your account is created successfully');
    }
}
