{{ $provider->id }} <br>
{{ $provider->complete_name }} <br>
{{ $provider->description }}

<form action="{{ route('providers.destroy',['provider'=>$provider->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the provider</button>
</form>

<form action="{{ route('providers.edit',['provider'=>$provider->id]) }}" method="get">
    @csrf
    <button type="submit">Update the provider</button>
</form>
