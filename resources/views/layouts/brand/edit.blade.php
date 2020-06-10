<form action="{{ route('brands.update',['brand'=>$brand->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $brand->name }}"><br>
    <textarea name="description" >{{ $brand->description }}</textarea><br>
    <input type="file" name="logo" multiple><br>
    <button type="submit">Update brand</button>
</form>
