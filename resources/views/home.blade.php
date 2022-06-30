@extends ('main')
@section('content')
@include('subheader')
@foreach($list_of_posts as $post)
<div class="card m-2">
    <div class="card-body">
        <h1 class="text-lg font-bold"><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h1>
        Author: <a href="/authors/{{ $post->author->id }}">{{ $post->author->username }}</a> <br>
        Category: <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <p class="text-sm italic">{{ $post->excerpt }}</p>
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

<!-- @if(request('searchbox')) -->
<div class="text-center mt-5">
<a href="/" class="btn btn-primary">Back Home</a>
</div>
<!-- @endif -->
@endsection