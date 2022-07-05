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
<div class="hidden" id="reply_con{{$comment->id}}">
    <div class="rounded ml-20 mr-12">
        <div class="rounded">
            <form action="/reply-comment" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{$comment->post_id}}">
                <input type="hidden" name="parent_id" value="{{$comment->id}}">
                <textarea name="comment" id="txt_comment" rows="5" class="form-control" name="comment" placeholder="Enter something here..."></textarea>
                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-blue-500 rounded-2xl px-4 py-2 mt-2 hover:bg-blue-400">Post Reply</button>
                </div>
            </form>
        </div>
    </div>
</div>
