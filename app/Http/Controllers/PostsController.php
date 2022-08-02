<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    public function get_all_post(Posts $posts, Category $category){
        $list_of_posts = $posts->where('status', '2')->with('category')->latest()->paginate(5);
        $list_of_category = $category->get();
        return view('home', compact('list_of_posts', 'list_of_category'));
    }

    public function get_post_by_id(Request $rq, Posts $posts){
        $post = $posts->find($rq->id);
        $comment = Comments::where('post_id', $rq->id)
                            ->where('parent_id', '<>', '0')
                            ->get();

        return view('post', compact(['post', 'comment']));
    }

    public function get_post_by_category(Request $rq, Category $category){
        $list_of_posts = $category->find($rq->id)->posts->where('status', '2');
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

    public function create(){
        if(auth()->guest()){
            return view('login');
        }
        return view('create_post');
    }

    public function store(){
        if(auth()->guest()){
            return view('login');
        }

        $attributes = request()->validate([
            'title' => ['required', Rule::unique('posts', 'title')],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'thumbnail' => 'required|image'
        ]);
        $attributes['user_id'] = auth()->id();
        $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        $attributes['status'] = 1;

        Posts::create($attributes);

        return redirect("/myaccount");
    }

    public function publish(Posts $post){
        if(auth()->guest()){
            return view('login');
        }

        $attributes = [
            'id' => request('post_id'),
            'status' => request('action')
        ];

        $post->where('id', request('post_id'))->update($attributes);
        $msg = request('action') === '2' ? 'Post Published Successful' : 'Post Delete Successful';
        return redirect("/myaccount")->with('success', $msg);
    }

    public function edit(Request $rq, Posts $post){
        if(auth()->guest()){
            return view('login');
        }

        $posts = $post->find($rq->id);
        return view('edit_post', compact('posts'));
    }

    public function update(){
        if(auth()->guest()){
            return view('login');
        }

        $attributes = request()->validate([
            'title' => ['required'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
        if(request('thumbnail')){
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        Posts::where('id', request('post_id'))->update($attributes);
        return redirect("/myaccount")->with('success', 'Post Update Successful');
    }
}
