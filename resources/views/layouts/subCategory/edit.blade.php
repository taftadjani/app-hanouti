<form action="{{ route('subCategory.update',['subCategory'=>$subCategory->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $subCategory->name }}"><br>
    <select name="category_id" >
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                @if ($category->id == $subCategory->category->id)
                    selected
                @endif>
                {{ $category->name }}
            </option>
        @endforeach
    </select><br>
    <button type="submit">Update store</button>
</form>
