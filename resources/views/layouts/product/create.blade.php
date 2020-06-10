<form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" required placeholder="Name"><br>
    <input type="text" name="reference" required placeholder="Reference"><br>
    <input type="text" name="sku"  placeholder="sku"><br>
    <textarea name="description" >description</textarea><br>
    <textarea name="keywords" >keywords</textarea><br>
    <input type="checkbox" name="is_liquid" id="is_liquid" ><br>
    <label for="is_liquid">is liquid</label><br>
    <input type="file" name="images[]" multiple><br>
    <button type="submit">Create product</button>
</form>
