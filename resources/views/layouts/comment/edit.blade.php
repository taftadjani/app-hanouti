<form action="{{ route('comments.update',['comment'=>$comment->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="content" required placeholder="content" value="{{ $comment->content }}"><br>
    <button type="submit">Update comment</button>
</form>
