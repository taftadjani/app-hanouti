{{ $delivery->id }} <br>
{{ $delivery->description }} <br>
{{ $delivery->delivery_date }} <br>
{{ $delivery->delivery_mode_id }} - {{ $delivery->deliveryMode->name }} <br>

<form action="{{ route('deliveries.destroy',['delivery'=>$delivery->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the delivery</button>
</form>

<form action="{{ route('deliveries.edit',['delivery'=>$delivery->id]) }}" method="get">
    @csrf
    <button type="submit">Update the delivery</button>
</form>
