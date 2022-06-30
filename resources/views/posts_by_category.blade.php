@extends ('main')

@section('content')
@include('subheader')
@foreach($list_of_posts as $post)

<div class="card m-5">
    <div class="card-body">
        <h1 class="text-lg font-bold"><a href="/post/{{ $post->id }}">{{ $post->title }}</a></h1>
        Author: <a href="/authors/{{ $post->author->id }}">{{ $post->author->username }}</a> <br>
        Category: <a href="/categories/{{ $post->category->id }}">{{ $post->category->name }}</a>
        <p>{{ $post->excerpt }}</p>
    </div>
</div>
@endforeach
<a href="/" class="btn btn-primary m-5">Back</a>
@endsection