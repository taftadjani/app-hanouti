{{ $post->id }} <br>
{{ $post->content }} <br>
{{ $post->store->id }}

<form action="{{ route('posts.destroy',['post'=>$post->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the post</button>
</form>

<form action="{{ route('posts.edit',['post'=>$post->id]) }}" method="get">
    @csrf
    <button type="submit">Update the post</button>
</form>
