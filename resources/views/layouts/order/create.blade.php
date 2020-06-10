<form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <select name="status">
        <option value="new">new</option>
        <option value="delivered">delivered</option>
    </select><br>
    <select name="currency_id">
        @foreach ($currencies as $currency)
            <option value="{{ $currency->id }}">{{ $currency->name }}</option>
        @endforeach
    </select><br>
    <select name="delivery_id">
        @foreach ($deliveries as $delivery)
            <option value="{{ $delivery->id }}">{{ $delivery->name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Create order</button>
</form>
