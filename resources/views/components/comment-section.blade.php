@props(['comment'])
<div class="bg-gray-300 rounded m-5 p-3">
    <div class="d-flex">
        <div>
            <img src="https://i.pravatar.cc/60?u={{ $comment->user_id }}" alt="avatar" class="rounded-full mr-2" width="60px" height="60px">
        </div>
        <div>
            <h3 class="font-bold">{{ $comment->author->username }}</h3>
            <small class="italic">Posted at {{ date('m-d-Y h:i a', strtotime($comment->created_at)) }}</small>
            <p>{{ $comment->comment }}</p>
        </div>
    </div>
    @php 
        $hide = $comment->parent_id != '0' ? 'hidden' : '';
    @endphp
    @auth
    <div class="d-flex justify-content-end">
        <a href="javascript:;" onclick="document.getElementById('reply_con{{$comment->id}}').classList.remove('hidden'); document.getElementById('reply_con{{$comment->id}}').focus();" class="mr-1 bg-blue-500 text-white rounded-full px-2 py-1 {{$hide}}"><i class="fa fa-comment"></i>&nbsp;Reply</a>
    </div>
    @endauth
</div>
<x-add-child-comment :comment="$comment"/>
