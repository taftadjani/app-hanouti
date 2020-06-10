<form action="{{ route('orderDetails.update',['orderDetail'=>$orderDetail->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="number" name="quantity" required value="{{ $orderDetail->quantity }}"><br>
    <select name="product_store_id">
        @foreach ($productStores as $productStore)
            <option value="{{ $productStore->id }}"
                @if ($productStore->id == $orderDetail->productStore->id)
                    selected
                @endif>{{ $productStore->name }}</option>
        @endforeach
    </select><br>
    <select name="unit_id">
        @foreach ($units as $unit)
            <option value="{{ $unit->id }}"
                @if ($unit->id == $orderDetail->unit->id)
                    selected
                @endif>{{ $unit->name }}</option>
        @endforeach
    </select><br>
    <select name="order_id">
        @foreach ($orders as $order)
            <option value="{{ $order->id }}"
                @if ($order->id == $orderDetail->order->id)
                    selected
                @endif>{{ $order->id }}</option>
        @endforeach
    </select><br>
    <button type="submit">Update order</button>
</form>
