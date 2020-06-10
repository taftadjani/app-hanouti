{{ $store->id }} <br>
{{ $store->name }} <br>

<form action="{{ route('stores.destroy',['store'=>$store->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the store</button>
</form>

<form action="{{ route('stores.edit',['store'=>$store->id]) }}" method="get">
    @csrf
    <button type="submit">Update the store</button>
</form>
