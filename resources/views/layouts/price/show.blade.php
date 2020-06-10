{{ $price->id }} <br>
{{ $price->quantity }} <br>
{{ $price->value }}
{{ $price->currency->symbol }} <br>
{{ $price->unit->abbrev }} <br>

<form action="{{ route('prices.destroy',['price'=>$price->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the price</button>
</form>

<form action="{{ route('prices.edit',['price'=>$price->id]) }}" method="get">
    @csrf
    <button type="submit">Update the price</button>
</form>
