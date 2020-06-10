<form action="{{ route('products.update',['product'=>$product->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $product->name }}"><br>
    <input type="text" name="reference" required placeholder="Reference"  value="{{ $product->reference }}"><br>
    <textarea name="description" > value="{{ $product->description }}"</textarea><br>
    <textarea name="keywords" > value="{{ $product->keywords }}"</textarea><br>
    <input  type="checkbox" name="is_liquid" id="is_liquid" @if ($product->is_liquid) checked @endif><br>
    <label for="is_liquid">is liquid</label><br>
    <input type="file" name="images[]" multiple><br>
    <button type="submit">Update store</button>
</form>
