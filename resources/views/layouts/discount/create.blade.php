<form action="{{ route('discounts.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    enabled :: <input type="checkbox" name="enabled"><br>
    percentage :: <input type="number" name="percentage" required><br>
    start_at :: <input type="date" name="start_at"><br>
    end_at :: <input type="date" name="end_at"><br>

    <select name="discountable_type" required>
        <option value="order">order</option>
        <option value="product_store">product_store</option>
    </select><br>
    <select name="discountable_id" required>
        <option value="1" data-type="order">order</option>
        <option value="2" data-type="product_store">product_store name</option>
    </select><br>
    <button type="submit">Create delivery</button>
</form>
