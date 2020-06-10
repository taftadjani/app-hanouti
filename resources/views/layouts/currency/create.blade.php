<form action="{{ route('currencies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" required placeholder="Name"><br>
    <input type="text" name="symbol" required placeholder="Symbol"><br>
    <input type="text" name="iso_code" required placeholder="Code iso"><br>
    <button type="submit">Create Currency</button>
</form>
