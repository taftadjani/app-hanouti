{{ $comment->id }} <br>
{{ $comment->content }} <br>

<form action="{{ route('cities.destroy',['comment'=>$comment->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the comment</button>
</form>

<form action="{{ route('cities.edit',['comment'=>$comment->id]) }}" method="get">
    @csrf
    <button type="submit">Update the comment</button>
</form>
