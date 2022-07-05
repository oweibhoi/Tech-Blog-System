@extends ('main')

@section('content')
<div class="card m-5">
    <div class="card-body">
        <h1 class="text-lg font-bold">{{ $post->title }}</h1>
        Author: <a href="/authors/{{ $post->author->id }}">{{ $post->author->username }}</a> <br>
        Category: <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <br><br>
        <p>{{ $post->body }}</p>
        <br>
    </div>
</div>
@auth
<x-add-comment :post="$post" />
@else
<div class="rounded bg-gray-100 p-5 ml-20 mr-20 mb-2">
    <a href="/register" class="text-blue">Register here</a> or <a href="/login" class="text-blue">Login </a>to leave your comment.
</div>
@endauth

@if(count($post->comments) > 0)
<div class="rounded bg-gray-100 p-5 ml-20 mr-20">
    <h1 class="font-bold">Comments</h1>
    @foreach($post->comments as $commet)
        @if($commet->parent_id === 0)
        <x-comment-section :comment="$commet" />
        @endif
        <div>
        @foreach($comment as $commet2)
            @if($commet->id == $commet2->parent_id && $commet2->parent_id !== 0)
            <div class="pl-5">
                <x-comment-section :comment="$commet2"/>
            </div>
            @endif
        @endforeach
        </div>
    @endforeach
</div>
@endif

<a href="/" class="btn btn-primary m-5">Back</a>
@endsection