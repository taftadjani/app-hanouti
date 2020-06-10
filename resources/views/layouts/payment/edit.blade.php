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
    <button type="submit">Update price</button>
</form>
