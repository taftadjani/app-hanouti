
<form action="{{ route('seens.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <select name="seenable_type" required>
        <option value="company">company</option>
        <option value="product_store">product_store</option>
        <option value="store">store</option>
    </select><br>
    <select name="seenable_id" required>
        <option value="1" data-type="company">company</option>
        <option value="2" data-type="product_store">product_store name</option>
    </select><br>
    <button type="submit">
        Save
    </button>

</form>
