{{ $language->id }} <br>
{{ $language->value }} <br>
{{ $language->iso_code }} <br>
{{ $language->description }} <br>

<form action="{{ route('languages.destroy',['language'=>$language->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the language</button>
</form>

<form action="{{ route('languages.edit',['language'=>$language->id]) }}" method="get">
    @csrf
    <button type="submit">Update the language</button>
</form>
