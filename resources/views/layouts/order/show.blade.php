{{ $order->id }} <br>
mail :: {{ $order->status }} <br>

<form action="{{ route('newsletters.destroy',['order'=>$order->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the order</button>
</form>

<form action="{{ route('newsletters.edit',['order'=>$order->id]) }}" method="get">
    @csrf
    <button type="submit">Update the order</button>
</form>
