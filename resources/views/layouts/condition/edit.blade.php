<form action="{{ route('conditions.update',['condition'=>$condition->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $condition->name }}"><br>
    <textarea name="description" >{{ $condition->description }}</textarea><br>
    <button type="submit">Update condition</button>
</form>
