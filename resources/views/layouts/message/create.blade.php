<form action="{{ route('messages.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <textarea name="content" cols="30" rows="10"></textarea><br>
    <select name="receiver_id" required>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->first_name }} - {{ $user->last_name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Create message</button>
</form>
