<form action="{{ route('modeles.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" required placeholder="Name"><br>
    <select name="brand_id" >
        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
        @endforeach
    </select>
    <button type="submit">Create modele</button>
</form>
