<form action="{{ route('productStores.update',['productStore'=>$productStore->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $productStore->name }}"><br>

    <select name="reference" id="reference" required>
        @foreach ($products as $product)
            <option value="{{ $product->reference }}"
                @if ($productStore->product->reference ==$product->reference)
                selected  @endif >
                {{ $product->reference }}
            </option>
        @endforeach
    </select>

    <select name="store_id" id="store_id" required>
        @for ($i = 0; $i < count($stores); $i++)
            <option value="{{ $stores[$i]->id }}"
                @if ($productStore->store->id == $stores[$i]->id)
                    selected
                @endif>
                {{ $stores[$i]->name }}
            </option>
        @endfor
    </select>
    <br>

    <select name="condition_id" id="condition_id" required>
        @for ($i = 0; $i < count($conditions); $i++)
            <option value="{{ $conditions[$i]->id }}"
                @if ($productStore->condition->id == $conditions[$i]->id)
                    selected
                @endif>
                {{ $conditions[$i]->name }}
            </option>
        @endfor
    </select>
    <br>

    <input type="checkbox" name="is_liquid" id="is_liquid"
        @if ($productStore->product->is_liquid)
        checked
        @endif>
    <label for="is_liquid">is liquid</label><br>

    <input type="checkbox" name="have_return" id="have_return"
        @if($productStore->have_return)
            checked
        @endif>
    <label for="have_return">have return</label><br>

    <input type="checkbox" name="visible_on_store" id="visible_on_store"
        @if ($productStore->visible_on_store)
            checked
        @endif>
    <label for="visible_on_store">Visible on store</label><br>

    <input type="checkbox" name="negociable" id="negociable"
        @if ($productStore->negociable)
            checked
        @endif>
    <label for="negociable">Negociable</label><br>

    <input type="number" name="quantity" id="quantity" value="{{ $productStore->quantity }}" min="0">
    <select name="unit_id" id="unit_id" required>
        @foreach ($units as $unit)
            <option value="{{ $unit->id }}"
                @if ($unit->id == $productStore->unit->id)
                    checked
                @endif>
                {{ $unit->abbrev }}
            </option>
        @endforeach
    </select><br>

    <textarea name="description" >{{ $productStore->description }}</textarea><br>
    <textarea name="keywords" >{{ $productStore->keywords }}</textarea><br>
    <input type="file" name="images[]" multiple placeholder="Images"><br>


    <button type="submit">Update the product store</button>
</form>
<hr>

@foreach ($productStore->prices as $price)
<form action="{{ route('prices.update',['price'=>$price->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="number" name="value" required placeholder="value" value="{{ $price->value }}">
    <input type="text" name="quantity" required placeholder="quantity" value="{{ $price->quantity }}">
    <button type="submit">Update price</button><br><br>
</form>

@endforeach
