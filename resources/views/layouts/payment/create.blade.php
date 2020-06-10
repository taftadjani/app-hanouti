<form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="number" name="amount" required placeholder="amount" value="0">
    <select name="order_id" >
        @foreach ($orders as $order)
            <option value="{{ $order->id }}">{{ $order->status }}</option>
        @endforeach
    </select><br>
    <select name="payment_method_id" >
        @foreach ($paymentMethods as $paymentMethod)
            <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Create payment</button>
</form>
