{{ $unit->id }} <br>
{{ $unit->name }} <br>
{{ $unit->abbrev }} <br>
{{ $unit->for_liquid }} <br>

<form action="{{ route('units.destroy',['unit'=>$unit->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the unit</button>
</form>

<form action="{{ route('units.edit',['unit'=>$unit->id]) }}" method="get">
    @csrf
    <button type="submit">Update the unit</button>
</form>
