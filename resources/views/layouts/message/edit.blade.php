<form action="{{ route('messages.update',['message'=>$message->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <textarea name="content" cols="30" rows="10"></textarea><br>
    <select name="receiver_id" required>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{ $user->first_name }} - {{ $user->last_name }}</option>
        @endforeach
    </select><br>
    <button type="submit">Update message</button>
</form>
