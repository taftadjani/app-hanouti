<form action="{{ route('stores.update',['store'=>$store->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $store->name }}"><br>
    <button type="submit">Update store</button>
</form>
