<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function login(){
        return view('login');
    }

    public function destroy(){
        auth()->logout();
        return redirect("/")->with('success', 'Account logout successfully');
    }

    public function create(){
        $attributes = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($attributes)){
            session()->regenerate();
            return redirect('/')->with('success', 'Welcome back!');
        }

        throw ValidationException::withMessages(['email' => 'You provide valid credentials']);
    }
}
