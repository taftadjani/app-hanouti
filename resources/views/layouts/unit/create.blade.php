<form action="{{ route('units.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" required placeholder="Name"><br>
    <input type="text" name="abbrev" required placeholder="abbrev"><br>

    <label for="for_liquid">for_liquid</label>
    <input type="checkbox" name="for_liquid" id="for_liquid"><br>

    <button type="submit">Create unit</button>
</form>
