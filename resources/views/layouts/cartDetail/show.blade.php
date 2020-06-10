{{ $cartDetail->id }} <br> <br>
{{ $cartDetail->cart->name }}<br>
{{ $cartDetail->productStore->id }} :: {{ $cartDetail->productStore->name }} <br>

<h1>Price</h1>
{{ $cartDetail->price->value }} / {{ $cartDetail->price->quantity }}

{{ $cartDetail->quantity }} {{ $cartDetail->unit->abbrev }}({{ $cartDetail->unit->name }}) <br>

<br>
<form action="{{ route('cartDetails.destroy',['cartDetail'=>$cartDetail->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the cartDetail</button>
</form>

<form action="{{ route('cartDetails.edit',['cartDetail'=>$cartDetail->id]) }}" method="get">
    @csrf
    <button type="submit">Update the cartDetail</button>
</form>
