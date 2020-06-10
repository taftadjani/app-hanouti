<form action="{{ route('cartDetails.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    Quantity :: <input type="number" name="quantity" required placeholder="quantity">
    <select name="unit_id" required>
        @foreach ($units as $unit)
            <option value="{{ $unit->id }}">{{ $unit->abbrev }}</option>
        @endforeach
    </select><br>
    Cart :: <select name="cart_id" required>
        @foreach ($carts as $cart)
            <option value="{{ $cart->id }}">{{ $cart->name }}</option>
        @endforeach
    </select><br>
    productStore :: <select name="product_store_id" required>
        @foreach ($productStores as $productStore)
            <option value="{{ $productStore->id }}">{{ $productStore->-name }} </option>
        @endforeach
    </select><br>
    Price :: <select name="price_id" required>
        @foreach ($prices as $price)
            <option value="{{ $price->id }}">{{ $price->value }}/{{ $price->quantity }}</option>
        @endforeach
    </select><br><br>
    <button type="submit">Create cart</button>
</form>
