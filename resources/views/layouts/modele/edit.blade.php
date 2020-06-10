<form action="{{ route('modeles.update',['modele'=>$modele->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $modele->name }}"><br>
    <select name="brand_id" >
        @foreach ($brands as $brand)
            <option value="{{ $brand->id }}"
                @if ($brand->id == $modele->brand_id)
                    selected
                @endif>
                {{ $brand->name }}
            </option>
        @endforeach
    </select>
    <button type="submit">Update store</button>
</form>
