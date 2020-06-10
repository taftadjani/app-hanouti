<form action="{{ route('bills.update',['bill'=>$bill->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <select name="order_id">
        @foreach ($orders as $order)
            <option value="{{ $order->id}}"
                @if ($order->id == $bill->order->id)
                    selected
                @endif>
                {{ $order->id }} :: {{ $order->created_at }}
            </option>
        @endforeach
    </select>
    <select name="payment_id">
        @foreach ($payments as $payment)
            <option value="{{ $payment->id}}"
                @if ($payment->id == $bill->payment->id)
                    selected
                @endif>
                {{ $payment->id }} :: {{ $payment->created_at }}
            </option>
        @endforeach
    </select>
    <input type="number" name="amount" required placeholder="amount" value="{{ $bill->amount }}"><br>
    <input type="checkbox" name="paids" placeholder="paids"
    @if ($bill->paids)
        checked
    @endif>
    <br>
    <button type="submit">Update bill</button>
</form>
