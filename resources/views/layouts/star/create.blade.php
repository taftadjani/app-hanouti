
<form action="{{ route('stars.store') }}" method="POST"  enctype="multipart/form-data">
    @csrf
    <select name="starable_type" required>
        <option value="company">company</option>
        <option value="product_store">product_store</option>
        <option value="store">store</option>
        <option value="user">user</option>
    </select><br>
    <select name="starable_id" required>
        <option value="1" data-type="company">company</option>
        <option value="2" data-type="product_store">product_store name</option>
    </select><br>
    <button type="submit">
        Save
    </button>

</form>
