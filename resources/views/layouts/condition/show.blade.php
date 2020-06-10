{{ $condition->id }} <br>
{{ $condition->name }} <br>

<form action="{{ route('conditions.destroy',['condition'=>$condition->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the condition</button>
</form>

<form action="{{ route('conditions.edit',['condition'=>$condition->id]) }}" method="get">
    @csrf
    <button type="submit">Update the condition</button>
</form>
