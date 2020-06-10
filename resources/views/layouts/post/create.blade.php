<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <textarea name="content"  cols="30" rows="10"></textarea>
    <select name="store_id" >
        @foreach ($stores as $store)
            <option value="{{ $store->id }}">{{ $store->name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Create post</button>
</form>
