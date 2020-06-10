{{ $author->id }} <br>
{{ $author->first_name }} :: {{ $author->last_name }} <br>
{{ $author->biography }}<br>
<img src="{{url('/uploads/images/'.$author->logo)}}" alt="logo">

<form action="{{ route('authors.destroy',['author'=>$author->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the author</button>
</form>

<form action="{{ route('authors.edit',['author'=>$author->id]) }}" method="get">
    @csrf
    <button type="submit">Update the author</button>
</form>
