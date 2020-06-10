{{ $message->id }} <br>
{{ $message->content }} <br>

<form action="{{ route('messages.destroy',['message'=>$message->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the message</button>
</form>

<form action="{{ route('messages.edit',['message'=>$message->id]) }}" method="get">
    @csrf
    <button type="submit">Update the message</button>
</form>
