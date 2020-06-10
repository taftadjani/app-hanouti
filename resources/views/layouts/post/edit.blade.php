<form action="{{ route('posts.update',['post'=>$post->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <textarea name="content"  cols="30" rows="10">{{ $post->content }}</textarea>
    <select name="store_id" >
        @foreach ($stores as $store)
            <option value="{{ $store->id }}"
                @if ($store->id == $post->store->id)
                    selected
                @endif>{{ $store->name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Update post</button>
</form>
