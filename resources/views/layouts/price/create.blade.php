<form action="{{ route('prices.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="number" name="value" required placeholder="value" value="0"> ::
    <select name="currency_id" >
        @foreach ($currencies as $currency)
            <option value="{{ $currency->id }}">{{ $currency->symbol }}</option>
        @endforeach
    </select><br>
    <input type="text" name="quantity" required placeholder="quantity" value="0"><br>
    <select name="unit_id" >
        @foreach ($units as $unit)
            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
        @endforeach
    </select><br>
    <select name="product_store_id" >
        @foreach ($productStores as $productStore)
            <option value="{{ $productStore->id }}">{{ $productStore->name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Create price</button>
</form>
