@props(['post'])
<div class="rounded bg-gray-100 p-5 ml-20 mr-20 mb-2">
    <header>
        <h2><strong>Leave your comment here..</strong></h2>
    </header>
    <div class="bg-gray-200 rounded m-5 p-3">
        <form action="/comment" method="post">
            @csrf
            <input type="hidden" name="post_id" value="{{ $post->id }}">
            <textarea name="comment" id="txt_comment" rows="5" class="form-control" name="comment" placeholder="Enter something here..."></textarea>
            <div class="flex justify-end">
                <button type="submit" class="text-white bg-blue-500 rounded-2xl px-4 py-2 mt-2 hover:bg-blue-400">POST</button>
            </div>
        </form>
    </div>
</div>