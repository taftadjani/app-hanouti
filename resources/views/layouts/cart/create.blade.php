<form action="{{ route('carts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="name" required placeholder="Name"><br>
    <select name="currency_id" >
        @foreach ($currencies as $currency)
            <option value="{{ $currency->id }}">{{ $currency->name }}({{ $currency->symbol }})</option>
        @endforeach
    </select><br>
    <button type="submit">Create cart</button>
</form>
