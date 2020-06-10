<form action="{{ route('providers.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="complete_name" required placeholder="complete_name">
    <input type="text" name="description"  placeholder="description"><br>
    <button type="submit">Create provider</button>
</form>
