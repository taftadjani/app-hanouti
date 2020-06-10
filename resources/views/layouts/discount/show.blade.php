{{ $discount->id }} <br>
{{ $discount->enabled }} <br>
{{ $discount->percentage }} <br>
{{ $discount->start_at }} - {{ $discount->end_at }} <br>
{{ $discount->discountable_type }} - {{ $discount->discountable_id }} <br>

<form action="{{ route('discounts.destroy',['discount'=>$discount->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the discount</button>
</form>

<form action="{{ route('discounts.edit',['discount'=>$discount->id]) }}" method="get">
    @csrf
    <button type="submit">Update the discount</button>
</form>
