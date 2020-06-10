<form action="{{ route('orders.update',['order'=>$order->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <select name="status">
        <option value="new">new</option>
        <option value="delivered">delivered</option>
    </select><br>
    <select name="currency_id">
        @foreach ($currencies as $currency)
            <option value="{{ $currency->id }}" @if ($currency->id == $order->currency->id)
                selected
            @endif>{{ $currency->name }}</option>
        @endforeach
    </select><br>
    <select name="delivery_id">
        @foreach ($deliveries as $delivery)
            <option value="{{ $delivery->id }}" @if ($delivery->id == $order->delivery->id)
                selected
            @endif>{{ $delivery->name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Update order</button>
</form>
