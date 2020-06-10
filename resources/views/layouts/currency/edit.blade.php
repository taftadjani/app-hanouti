<form action="{{ route('currencies.update',['currency'=>$currency->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $currency->name }}"><br>
    <input type="text" name="symbol" required placeholder="Symbol" value="{{ $currency->symbol }}"><br>
    <input type="text" name="iso_code" required placeholder="Code iso" value="{{ $currency->iso_code }}"><br>
    <button type="submit">Update currency</button>
</form>
