<form action="{{ route('deliveries.update',['delivery'=>$delivery->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="date" name="delivery_date" required  value="{{ $delivery->delivery_date }}"><br>
    <textarea name="description" cols="30" rows="10">{{ $delivery->description }}</textarea><br>
    <select name="delivery_mode_id" >
        @foreach ($deliveryModes as $deliveryMode)
            <option value="{{ $deliveryMode->id }}"
                @if ($deliveryMode->id == $delivery->deliveryMode->id)
                    selected
                @endif>{{ $deliveryMode->name }}</option>
        @endforeach
    </select>
    <button type="submit">Update delivery</button>
</form>
