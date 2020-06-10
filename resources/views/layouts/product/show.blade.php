{{ $product->id }} <br>
{{ $product->name }} <br>
{{ $product->reference }} <br>

<form action="{{ route('products.destroy',['product'=>$product->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the product</button>
</form>

<form action="{{ route('products.edit',['product'=>$product->id]) }}" method="get">
    @csrf
    <button type="submit">Update the product</button>
</form>
