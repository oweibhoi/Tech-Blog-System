<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PostsController extends Controller
{
    public function get_all_post(Posts $posts, Category $category)
    {

        $list_of_posts = DB::table('posts')
            ->join('users', 'users.id', '=', 'posts.user_id', 'left')
            ->join('categories', 'categories.id', '=', 'posts.category_id', 'left')
            ->select(
                'posts.*',
                'users.username',
                'categories.name as category_name',
                DB::raw('(SELECT count(reaction) FROM reactions WHERE reactions.post_id=posts.id AND reactions.reaction=1) as likes'),
                DB::raw('(SELECT count(reaction) FROM reactions WHERE reactions.post_id=posts.id AND reactions.reaction=0) as dislikes'),
                DB::raw('(SELECT count(comments.id) FROM comments WHERE comments.post_id=posts.id) as comments'),
                DB::raw('(SELECT reactions.reaction FROM reactions WHERE reactions.post_id=posts.id AND reactions.user_id='. auth()->id() .') as reaction')
            )
            ->where('status', 2)
            ->latest('posts.created_at')
            ->paginate(10);

        $list_of_category = $category->get();
        return view('home', compact('list_of_posts', 'list_of_category'));
    }

    public function get_post_by_id(Request $rq, Posts $posts)
    {
        $post = $posts->find($rq->id);
        $comment = Comments::where('post_id', $rq->id)
            ->where('parent_id', '<>', '0')
            ->get();

        return view('post', compact(['post', 'comment']));
    }

    public function get_post_by_category(Request $rq, Category $category)
    {
        $list_of_posts = $category->find($rq->id)->posts->where('status', '2');
        return view('posts_by_category', [
            'list_of_posts' => $list_of_posts
        ]);
    }

    public function get_post_by_author(Request $rq, User $author)
    {
        $list_of_posts = $author->find($rq->id)->user_posts;
        return view('posts_by_author', [
            'list_of_posts' => $list_of_posts
        ]);
    }

    public function search_post(Posts $posts)
    {
        $list_of_posts = $posts->where('title', 'like', '%' . request('searchbox') . '%')->paginate(5);
        return view('home', compact('list_of_posts'));
    }

    public function create()
    {
        if (auth()->guest()) {
            return view('login');
        }
        return view('create_post');
    }

    public function store()
    {
        if (auth()->guest()) {
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

    public function publish(Posts $post)
    {
        if (auth()->guest()) {
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

    public function edit(Request $rq, Posts $post)
    {
        if (auth()->guest()) {
            return view('login');
        }

        $posts = $post->find($rq->id);
        return view('edit_post', compact('posts'));
    }

    public function update()
    {
        if (auth()->guest()) {
            return view('login');
        }

        $attributes = request()->validate([
            'title' => ['required'],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
        ]);
        if (request('thumbnail')) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        Posts::where('id', request('post_id'))->update($attributes);
        return redirect("/myaccount")->with('success', 'Post Update Successful');
    }
}
