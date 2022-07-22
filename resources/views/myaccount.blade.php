@extends ('main')

@section('content')
<div class="card m-5">
    <div class="card-body">
        <h1 class="text-2xl mb-3">My Account</h1>
        <div class="row">
            <div class="col-md-3">
                <div class="list-group">
                    @if(auth()->user()->username !== 'Administrator')
                    <a href="#" class="list-group-item list-group-item-action {{ request()->route()->uri === 'myaccount' ? 'active' : '' }}">
                        My Post
                    </a>
                    <a href="#" class="list-group-item list-group-item-action">Profile</a>
                    @else
                    <a href="#" class="list-group-item list-group-item-action">Morbi leo risus</a>
                    <a href="#" class="list-group-item list-group-item-action">Porta ac consectetur ac</a>
                    <a href="#" class="list-group-item list-group-item-action disabled">Vestibulum at eros</a>
                    @endif
                </div>
            </div>
            <div class="col-md-9">
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col" class="w-80">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($list_of_posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->category->name }}</td>
                            <td>
                                <button class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> EDIT</button>
                                <button class="btn btn-danger btn-sm"><i class="fa fa-remove"></i> INACTIVE</button>
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