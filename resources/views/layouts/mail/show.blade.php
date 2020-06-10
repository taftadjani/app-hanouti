{{ $mail->id }} <br>
{{ $mail->value }} <br>

<form action="{{ route('mails.destroy',['mail'=>$mail->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the mail</button>
</form>

<form action="{{ route('mails.edit',['mail'=>$mail->id]) }}" method="get">
    @csrf
    <button type="submit">Update the mail</button>
</form>
