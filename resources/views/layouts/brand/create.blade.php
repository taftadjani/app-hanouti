<form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" required placeholder="Name"><br>
    <textarea name="description" ></textarea><br>
    <input type="file" name="logo"><br>
    <button type="submit">Create brand</button>
</form>
