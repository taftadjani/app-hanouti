<form action="{{ route('discounts.update',['discount'=>$discount->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    enabled :: <input type="checkbox" name="enabled" @if ($discount->enabled)
        checked
    @endif><br>
    percentage :: <input type="number" name="percentage" required  value="{{ $discount->percentage }}"><br>
    start_at :: <input type="date" name="start_at"  value="{{ $discount->start_at }}"><br>
    end_at :: <input type="date" name="end_at"  value="{{ $discount->end_at }}"><br>

    <select name="discountable_type" required>
        <option value="order">order</option>
        <option value="product_store">product_store</option>
    </select><br>
    <select name="discountable_id" required>
        <option value="1" data-type="order">order</option>
        <option value="2" data-type="product_store">product_store name</option>
    </select><br>
    <button type="submit">Update discount</button>
</form>
