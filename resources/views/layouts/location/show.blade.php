{{ $location->id }} <br>
{{ $location->city->name }} <br>
{{ $location->description }} <br>
{{ $location->locationable_type }} - {{ $location->locationable_id }}<br>

<form action="{{ route('locations.destroy',['location'=>$location->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the location</button>
</form>

<form action="{{ route('locations.edit',['location'=>$location->id]) }}" method="get">
    @csrf
    <button type="submit">Update the location</button>
</form>
