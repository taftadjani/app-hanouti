<form action="{{ route('currencies.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="date" name="delivery_date" required><br>
    <textarea name="description" cols="30" rows="10"></textarea><br>
    <select name="delivery_mode_id" >
        @foreach ($deliveryModes as $deliveryMode)
            <option value="{{ $deliveryMode->id }}">{{ $deliveryMode->name }}</option>
        @endforeach
    </select>
    <button type="submit">Create delivery</button>
</form>
