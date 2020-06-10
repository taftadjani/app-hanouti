<form action="{{ route('authors.update',['author'=>$author->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="first_name" required placeholder="first_name" value="{{ $author->first_name }}"><br>
    <input type="text" name="last_name" required placeholder="last_name" value="{{ $author->last_name }}"><br>
    <textarea name="biography">{{ $author->biography }}</textarea><br>
    <input type="file" name="logo" value="{{ $author->logo }}"><br>
    <button type="submit">Update store</button>
</form>
