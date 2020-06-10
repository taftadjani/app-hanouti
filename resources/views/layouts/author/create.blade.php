<form action="{{ route('authors.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="first_name" required placeholder="first_name"><br>
    <input type="text" name="last_name" required placeholder="last_name"><br>
    <textarea name="biography"></textarea><br>
    <input type="file" name="logo"><br>
    <button type="submit">Create author</button>
</form>
