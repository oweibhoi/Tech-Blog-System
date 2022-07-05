<?php

namespace App\Http\Controllers;

use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    protected $guarded = [];

    public function store(Comments $comment, Request $request){
        $request->validate([
            'comment' => 'required'
        ]);

        $comment->create([
            'post_id' => $request->input('post_id'),
            'comment' => $request->input('comment'),
            'user_id' => auth()->id(),
            'parent_id' => 0
        ]);

        return back();
    }

    public function storeReplyComment(Comments $comment, Request $request){
        $request->validate([
            'comment' => 'required'
        ]);
        // dd($request);
        $comment->create([
            'post_id' => $request->input('post_id'),
            'parent_id' => $request->input('parent_id'),
            'comment' => $request->input('comment'),
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}
