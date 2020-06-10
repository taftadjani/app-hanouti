<form action="{{ route('prices.update',['price'=>$price->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')



    <input type="number" name="value" required placeholder="value" value="{{ $price->value }}"> ::
    <select name="currency_id" >
        @foreach ($currencies as $currency)
            <option value="{{ $currency->id }}"
                @if ($currency->id == $price->currency->id)
                    selected
                @endif>
                {{ $currency->symbol }}
            </option>
        @endforeach
    </select><br>
    <input type="text" name="quantity" required placeholder="quantity" value="{{ $price->quantity }}"><br>
    <select name="unit_id" >
        @foreach ($units as $unit)
            <option value="{{ $unit->id }}"
                @if ($unit->id == $price->unit->id)
                    selected
                @endif>{{ $unit->name }}</option>
        @endforeach
    </select><br>
    <select name="product_store_id" >
        @foreach ($productStores as $productStore)
            <option value="{{ $productStore->id }}"
                @if ($productStore->id == $price->productStore->id)
                    selected
                @endif>{{ $productStore->name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Update price</button>
</form>
