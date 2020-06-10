<form action="{{ route('locations.update',['location'=>$location->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <select name="city_id">
        @foreach ($cities as $city)
            <option value="{{ $city->id }}"
                @if ($city->id == $location->city->id)
                    selected
                @endif>{{ $city->name }}</option>
        @endforeach
    </select>

    <input type="number" name="lng" value="{{ $city->lng }}"><br>
    <input type="number" name="lat" value="{{ $city->lat }}" ><br>
    <textarea name="description" cols="30" rows="10">{{ $city->description</textarea>
    <input type="text" name="zip_code"  value="{{ $city->zip_code }}"><br>

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
    <button type="submit">Update location</button>
</form>
