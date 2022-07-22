<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index(Posts $posts){
        $list_of_posts = $posts->where('user_id', auth()->user()->id)->get();
        return view('myaccount', compact('list_of_posts'));
    }
}
