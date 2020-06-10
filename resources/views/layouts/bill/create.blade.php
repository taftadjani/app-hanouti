<form action="{{ route('bills.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <select name="order_id">
        @foreach ($orders as $order)
            <option value="{{ $order->id}}">{{ $order->id }} :: {{ $order->created_at }}</option>
        @endforeach
    </select>
    <select name="payment_id">
        @foreach ($payments as $payment)
            <option value="{{ $payment->id}}">{{ $payment->id }} :: {{ $payment->created_at }}</option>
        @endforeach
    </select>
    <input type="number" name="amount" required placeholder="amount" value="0"><br>
    <input type="checkbox" name="paids" placeholder="paids"><br>
    <button type="submit">Create bill</button>
</form>
