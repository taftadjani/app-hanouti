<form action="{{ route('companies.update',['company'=>$company->id]) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <input type="text" name="name" required placeholder="Name" value="{{ $company->name }}"><br>
    <textarea name="description">
        {{ $company->description }}
    </textarea><br>
    <button type="submit">Update company</button>
</form>
