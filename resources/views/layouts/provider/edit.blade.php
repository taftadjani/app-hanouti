<form action="{{ route('providers.update',['provider'=>$provider->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="complete_name" required placeholder="complete_name" value="{{ $provider->complete_name }}">
    <input type="text" name="description"  placeholder="description"  value="{{ $provider->description }}"><br>
    <button type="submit">Update provider</button>
</form>
