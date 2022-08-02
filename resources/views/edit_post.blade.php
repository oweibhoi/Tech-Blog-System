@extends ('main')

@section('content')
<div class="m-5 py-5 d-flex justify-content-center">
    <div class="card w-50">
        <div class="card-body">
            <form action="/posts/update" method="post" enctype="multipart/form-data">
                <h1 class="text-center mb-3">Edit Post</h1>
                <hr class="mb-2">
                @csrf
                <div class="form-group">
                    <input type="hidden" value="{{ $posts->id }}" name="post_id">
                    <label for="title">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Enter title" value="{{ $posts->title }}">
                    @error('title')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="excerpt">Excerpt</label>
                    <textarea class="form-control" id="excerpt" name="excerpt" rows="3" placeholder="Enter excerpt">{{ $posts->excerpt }}</textarea>
                    @error('excerpt')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="body">Content</label>
                    <textarea class="form-control" id="body" name="body" rows="10" placeholder="Enter content">{{ $posts->body }}</textarea>
                    @error('body')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="thumbnail">Thumbnail</label>
                    <input type="file" class="form-control" id="thumbnail" name="thumbnail" placeholder="Select Image Thumbnail">
                    <small>Select image with 450h x 600w pixel</small>
                    @error('thumbnail')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                    <div class="d-flex align-items-center">
                        <label>Current Image</label>
                        <img src="{{ asset('storage/'.$posts->thumbnail) }}" alt="image" width="250" height="250" class="m-2">
                    </div>
                </div>
                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" id="category" name="category_id">
                        @foreach(App\Models\Category::all() as $cat)
                            <option value="{{ $cat->id }}" {{ $posts->category_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                        @endforeach
                    </select>
                    @error('category_id')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary float-right text-black">Save</button>
            </form>
        </div>
    </div>

</div>
@endsection