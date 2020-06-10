{{ $subCategory->id }} <br>
{{ $subCategory->name }} <br>
{{ $subCategory->category->name }} <br>

<form action="{{ route('subCategory.destroy',['subCategory'=>$subCategory->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the subCategory</button>
</form>

<form action="{{ route('subCategory.edit', ['subCategory' => $subCategory->id]) }}" method="get">
    @csrf
    <button type="submit">Update the subCategory</button>
</form>
