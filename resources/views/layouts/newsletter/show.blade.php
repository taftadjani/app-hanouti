{{ $newsletter->id }} <br>
mail :: {{ $newsletter->mail->value }} <br>

<form action="{{ route('newsletters.destroy',['newsletter'=>$newsletter->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the newsletter</button>
</form>

<form action="{{ route('newsletters.edit',['newsletter'=>$newsletter->id]) }}" method="get">
    @csrf
    <button type="submit">Update the newsletter</button>
</form>
