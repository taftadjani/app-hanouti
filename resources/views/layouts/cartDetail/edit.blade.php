<form action="{{ route('cartDetails.update',['cartDetail'=>$cartDetail->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="number" name="quantity" required placeholder="quantity" value="{{ $cartDetail->quantity }}">
    <select name="unit_id" required>
        @foreach ($units as $unit)
            <option value="{{ $unit->id }}"
                @if ($unit->id == $cartDetail->unit->id)
                    selected
                @endif>
                {{ $unit->abbrev }}
            </option>
        @endforeach
    </select><br>
    Cart :: <select name="cart_id" required>
        @foreach ($carts as $cart)
            <option value="{{ $cart->id }}"
                @if ($cart->id == $cartDetail->cart->id)
                    selected
                @endif>
                {{ $cart->name }}
            </option>
        @endforeach
    </select><br>
    productStore :: <select name="product_store_id" required>
        @foreach ($productStores as $productStore)
            <option value="{{ $productStore->id }}"
                @if ($productStore->id == $cartDetail->productStore->id)
                    selected
                @endif>
                {{ $productStore->name }}
            </option>
        @endforeach
    </select><br><br>
    Price :: <select name="price_id" required>
        @foreach ($prices as $price)
            <option value="{{ $price->id }}"
                @if ($price->id == $cartDetail->price->id)
                    selected
                @endif>
                {{ $price->value }}/{{ $price->quantity }}
            </option>
        @endforeach
    </select><br><br>
    <button type="submit">Update cartDetail</button>
</form>
