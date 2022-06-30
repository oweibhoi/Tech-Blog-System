<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\Models\User;

class PostsController extends Controller
{
    public function get_all_post(Posts $posts){
        $list_of_posts = $posts->with('category')->latest()->paginate(5);
        return view('home', compact('list_of_posts'));
    }

    public function get_post_by_id(Request $rq, Posts $posts){
        $post = $posts->find($rq->id);
        return view('post', compact('post'));
    }

    public function get_post_by_category(Request $rq, Category $category){
        $list_of_posts = $category->find($rq->id)->posts;
        return view('posts_by_category', [
            'list_of_posts' => $list_of_posts
        ]);
    }

    public function get_post_by_author(Request $rq, User $author){
        $list_of_posts = $author->find($rq->id)->user_posts;
        return view('posts_by_author', [
            'list_of_posts' => $list_of_posts
        ]);
    }

    public function search_post(Posts $posts){
        $list_of_posts = $posts->where('title', 'like', '%'.request('searchbox').'%')->paginate(5);
        return view('home', compact('list_of_posts'));
    }
}
