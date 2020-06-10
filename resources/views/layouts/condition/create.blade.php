<form action="{{ route('conditions.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" required placeholder="Name"><br>
    <textarea name="description" placeholder="description"></textarea><br>
    <button type="submit">Create condition</button>
</form>
