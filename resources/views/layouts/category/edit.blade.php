<form action="{{ route('categories.update',['category'=>$category->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $category->name }}"><br>
    <textarea name="description" >{{ $category->description }}</textarea><br>
    <button type="submit">Update category</button>
</form>
