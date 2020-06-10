<form action="{{ route('languages.update',['language'=>$language->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="number" name="value" required value="{{ $language->value }}"><br>
    <input type="text" name="iso_code" value="{{ $language->iso_code }}"><br>
    <input type="text" name="description" value="{{ $language->description }}"><br>
    <button type="submit">Update language</button>
</form>
