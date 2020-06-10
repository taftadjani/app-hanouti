{{ $brand->id }} <br>
{{ $brand->name }} <br>
{{ $brand->description }} <br>
<img src="{{ url('/uploads/images/'.$brand->logo )}}" alt="">

<form action="{{ route('brands.destroy',['brand'=>$brand->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the brand</button>
</form>

<form action="{{ route('brands.edit',['brand'=>$brand->id]) }}" method="get">
    @csrf
    <button type="submit">Update the brand</button>
</form>
