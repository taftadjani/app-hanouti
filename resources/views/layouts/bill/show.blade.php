{{ $bill->id }} <br>
payment_id :: {{ $bill->payment_id }} <br>
order_id :: {{ $bill->order_id }} <br>
amount :: {{ $bill->amount }} <br>
paids? :: {{ $bill->paids }} <br>

<form action="{{ route('bills.destroy',['bill'=>$bill->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the bill</button>
</form>

<form action="{{ route('bills.edit',['bill'=>$bill->id]) }}" method="get">
    @csrf
    <button type="submit">Update the bill</button>
</form>
