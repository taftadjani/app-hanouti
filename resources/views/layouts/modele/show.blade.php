{{ $modele->id }} <br>
{{ $modele->name }} <br>

<form action="{{ route('modeles.destroy',['modele'=>$modele->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the modele</button>
</form>

<form action="{{ route('modeles.edit',['modele'=>$modele->id]) }}" method="get">
    @csrf
    <button type="submit">Update the modele</button>
</form>
