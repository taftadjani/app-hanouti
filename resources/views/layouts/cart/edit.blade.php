<form action="{{ route('carts.update',['cart'=>$cart->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $cart->name }}"><br>
    <select name="currency_id" >
        @foreach ($currencies as $currency)
            <option value="{{ $currency->id }}"
                @if ($currency->id == $cart->currency->id)
                    selected
                @endif>
                {{ $currency->name }}({{ $currency->symbol }})
            </option>
        @endforeach
    </select><br>
    <button type="submit">Update cart</button>
</form>
