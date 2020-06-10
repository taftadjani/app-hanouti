{{ $orderDetail->id }} <br>
quantity :: {{ $orderDetail->quantity }} <br>

<form action="{{ route('orderDetails.destroy',['orderDetail'=>$orderDetail->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the orderDetail</button>
</form>

<form action="{{ route('orderDetails.edit',['orderDetail'=>$orderDetail->id]) }}" method="get">
    @csrf
    <button type="submit">Update the orderDetail</button>
</form>
