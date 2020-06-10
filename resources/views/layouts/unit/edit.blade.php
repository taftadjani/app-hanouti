<form action="{{ route('units.update',['unit'=>$unit->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $unit->name }}"><br>

    <input type="text" name="abbrev" required placeholder="abbrev"  value="{{ $unit->abbrev }}"><br>

    <label for="for_liquid">for_liquid</label>
    <input type="checkbox" name="for_liquid"  id="for_liquid"
        @if ($unit->for_liquid)
            checked
        @endif><br>

    <button type="submit">Update unit</button>
</form>
