<form action="{{ route('languages.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <select name="city_id">
        @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
        @endforeach
    </select>

    <input type="number" name="lng" ><br>
    <input type="number" name="lat" ><br>
    <textarea name="description" cols="30" rows="10"></textarea>
    <input type="text" name="zip_code"><br>

    <select name="locationable_type" required>
        <option value="store">store</option>
        <option value="user">user</option>
        <option value="company">company</option>
        <option value="provider">provider</option>
        <option value="product_store">product_store</option>
    </select><br>
    <select name="locationable_id" required>
        <option value="1" data-type="company">company</option>
        <option value="2" data-type="product_store">product_store name</option>
    </select><br>
    <button type="submit">Create language</button>
</form>
