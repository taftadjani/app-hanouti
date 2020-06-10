<form action="{{ route('newsletters.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="email" name="mail" required placeholder="mail"><br>
    <button type="submit">Create newsletter</button>
</form>
