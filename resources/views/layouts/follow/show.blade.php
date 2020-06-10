{{ $follow->id }} <br>
{{ $follow->followable_type }} - {{ $follow->followable_id }} <br>

<form action="{{ route('follows.destroy',['follow'=>$follow->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the follow</button>
</form>

<form action="{{ route('follows.edit',['follow'=>$follow->id]) }}" method="get">
    @csrf
    <button type="submit">Update the follow</button>
</form>
