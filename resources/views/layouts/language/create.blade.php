<form action="{{ route('languages.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="number" name="value" required><br>
    <input type="text" name="iso_code"><br>
    <input type="text" name="description"><br>
    <button type="submit">Create language</button>
</form>
