<form action="{{ route('newsletters.update',['newsletter'=>$newsletter->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="email" name="mail" required placeholder="newsletter" value="{{ $newsletter->mail->value }}"><br>
    <button type="submit">Update newsletter</button>
</form>
