@extends ('main')
@section('content')
@include('subheader')

<div class="wrapper mt-2">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12 px-5">
                @foreach($list_of_posts as $post)
                <div class="m-5 bg-light rounded">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/'.$post->thumbnail) }}" alt="image" class="thumbnail-image">
                        </div>
                        <div class="col-md-6 p-5">
                            <small>Posted on {{ date('M d, Y h:i a', strtotime($post->created_at)) }}</small>
                            <h1 class="text-lg font-bold break-words mb-1"><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h1>
                            Author: <a href="/authors/{{ $post->user_id }}">{{ $post->username }}</a> <br>
                            Category: <a href="/categories/{{ $post->category_id }}">{{ $post->category_name }}</a>
                            <p class="text-sm italic mt-4">{{ $post->excerpt }}</p>
                            @auth
                            <div class="content-like-dislike">
                                <form id="frm-reaction-{{ $post->id }}">
                                    @csrf
                                    <a href="javascript:void(0);" class="btn {{ ($post->reaction == 1 ? 'btn-primary' : 'btn-outline-primary') }} rounded-full btn-like btn-like-{{ $post->id }}" onclick="like('{{ $post->id }}')"><i class="fa fa-thumbs-up"></i> {{ abbreviateNumber($post->likes) }}</a>
                                    <a href="javascript:void(0);" class="btn {{ ($post->reaction == 0 ? 'btn-danger' : 'btn-outline-danger') }} rounded-full btn-dislike btn-dislike-{{ $post->id }}" onclick="dislike('{{ $post->id }}')"><i class="fa fa-thumbs-down"></i> {{ abbreviateNumber($post->dislikes) }}</a>
                                    <a href="/post/{{ $post->id }}" class="btn btn-outline-secondary rounded-full btn-comment"><i class="fa fa-comment"></i> {{ abbreviateNumber($post->comments) }}</a>
                                </form>
                            </div>
                            @else
                            <div class="content-like-dislike">
                                <a href="javascript:void(0);" disabled class="btn btn-outline-primary rounded-full login-reminder"><i class="fa fa-thumbs-up"></i> {{ abbreviateNumber($post->likes) }}</a>
                                <a href="javascript:void(0);" disabled class="btn btn-outline-danger rounded-full login-reminder"><i class="fa fa-thumbs-down"></i> {{ abbreviateNumber($post->dislikes) }}</a>
                                <a href="/post/{{ $post->id }}" disabled class="btn btn-outline-secondary rounded-full"><i class="fa fa-comment"></i> {{ abbreviateNumber($post->comments) }}</a>
                            </div>
                            @endauth
                            <a href="/post/{{ $post->id }}" class="btn btn-outline-primary rounded-full btn-read-more">Read More</a>
                        </div>
                    </div>
                </div>

                @endforeach
                @if(count($list_of_posts) === 0)
                <h1 class="text-center mt-5">No posts found.</h1>
                @endif

                @php
                $currentURL = Request::url();
                $currentURL = explode('/', $currentURL);
                if(!isset($currentURL[3]) || $currentURL[3] !== 'categories'){
                echo '<div class="p-5">'.$list_of_posts->links().'</div>';
                }
                @endphp
            </div>

            <div class="col-md-4">
                <div class="m-5 bg-gray-50 rounded-lg p-5">
                    <h2 class="mb-3">Category</h2>
                    <div class="list-group">
                        @foreach($list_of_category as $cat)
                        <a href="/categories/{{ $cat->id }}" class="list-group-item list-group-item-action">{{ $cat->name }}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- @if(request('searchbox')) -->
<div class="text-center mt-5">
    <a href="/" class="btn btn-primary">Back Home</a>
</div>
<!-- @endif -->
@endsection