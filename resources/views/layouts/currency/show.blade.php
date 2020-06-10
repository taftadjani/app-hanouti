{{ $currency->id }} <br>
{{ $currency->name }} <br>
{{ $currency->symbol }} <br>
{{ $currency->iso_code }} <br>

<form action="{{ route('currencies.destroy',['currency'=>$currency->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the currency</button>
</form>

<form action="{{ route('currencies.edit',['currency'=>$currency->id]) }}" method="get">
    @csrf
    <button type="submit">Update the currency</button>
</form>
