<form action="{{ route('seens.update',['seen'=>$seen->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $seen->name }}"><br>
    <button type="submit">Update seen</button>
</form>
