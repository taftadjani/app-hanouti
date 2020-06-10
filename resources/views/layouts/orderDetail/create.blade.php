<form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="number" name="quantity"  required  ><br>
    <select name="product_store_id">
        @foreach ($productStores as $productStore)
            <option value="{{ $productStore->id }}">{{ $productStore->name }}</option>
        @endforeach
    </select><br>
    <select name="unit_id">
        @foreach ($units as $unit)
            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
        @endforeach
    </select><br>
    <select name="order_id">
        @foreach ($orders as $order)
            <option value="{{ $order->id }}">{{ $order->id }}</option>
        @endforeach
    </select><br>
    <button type="submit">Create order detail</button>
</form>
