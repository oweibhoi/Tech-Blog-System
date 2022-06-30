@props(['comment'])
<div class="bg-gray-300 rounded m-5 p-3">
    <div class="float-right">
        <a href="#" class="mr-1"><i class="far fa-edit"></i></a>
        <a href="#"><i class="fa fa-trash"></i></a>
    </div>
    <div class="d-flex">
        <div>
            <img src="https://i.pravatar.cc/60?u={{ $comment->id }}" alt="avatar" class="rounded-full mr-2" width="60px" height="60px">
        </div>
        <div>
            <h3 class="font-bold">{{ $comment->author->username }}</h3>
            <small class="italic">Posted at {{ $comment->created_at }}</small>
            <p>{{ $comment->comment }}</p>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="#" class="mr-1 bg-blue-500 text-white rounded-full px-2 py-1"><i class="fa fa-comment"></i>&nbsp;Reply</a>
    </div>
</div>