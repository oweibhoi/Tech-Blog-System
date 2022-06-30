@extends ('main')

@section('content')
<div class="card m-5">
    <div class="card-body">
        <h1 class="text-lg font-bold">{{ $post->title }}</h1>
        Author: <a href="/authors/{{ $post->author->id }}">{{ $post->author->username }}</a> <br>
        Category: <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <p>{{ $post->body }}</p>
        <br>
    </div>
</div>


@if(count($post->comments) > 0)
<div class="rounded bg-gray-100 p-5 ml-20 mr-20">
    <h1 class="font-bold">Comments</h1>
    @foreach($post->comments as $comment)
    <x-comment-section :comment="$comment"/>
    @endforeach
</div>
@endif

<a href="/" class="btn btn-primary m-5">Back</a>
@endsection