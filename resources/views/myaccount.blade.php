@extends ('main')

@section('content')
<div class="card m-5">
    <div class="card-body">
        <h1 class="text-2xl mb-3">My Account</h1>
        <div class="row">
            <x-sidemenu></x-sidemenu>
            <div class="col-md-9">
                <a href="/posts/create" class="btn btn-primary float-right">Create Post</a><br><br>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Status</th>
                            <th scope="col" class="w-80">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_of_posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                @php
                                if($post->status == '1'){
                                echo '<span class="badge badge-primary">New Draft</span>';
                                } else {
                                echo '<span class="badge badge-success">Published</span>';
                                }
                                @endphp
                            </td>
                            <td>
                                <a href="/posts/edit/{{ $post->id }}" class="btn btn-primary btn-sm">EDIT</a>
                                @if($post->status == 1) <form action="/publish-post" method="post">@csrf<input type="hidden" value="{{ $post->id }}" name="post_id"><input type="hidden" value="2" name="action"><button class="btn btn-success btn-sm">PUBLISHED</button></form>@endif
                                <form action="/publish-post" method="post">@csrf<input type="hidden" value="{{ $post->id }}" name="post_id"><input type="hidden" value="0" name="action"><button class="btn btn-danger btn-sm">DELETE</button></form>

                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
        </div>

    </div>
</div>
@endsection