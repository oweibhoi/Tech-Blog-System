@props(['comment'])
<div class="hidden" id="reply_con{{$comment->id}}">
    <div class="rounded ml-20 mr-12">
        <div class="rounded">
            <form action="/reply-comment" method="post">
                @csrf
                <input type="hidden" name="post_id" value="{{$comment->post_id}}">
                <input type="hidden" name="parent_id" value="{{$comment->id}}">
                <textarea name="comment" id="txt_comment" rows="5" class="form-control" name="comment" placeholder="Enter something here..." required></textarea>
                @error('comment')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
                <div class="flex justify-end">
                    <button type="submit" class="text-white bg-blue-500 rounded-2xl px-4 py-2 mt-2 hover:bg-blue-400">Post Reply</button>
                </div>
            </form>
        </div>
    </div>
</div>