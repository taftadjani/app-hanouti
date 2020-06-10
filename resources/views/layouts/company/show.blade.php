{{ $company->id }} <br>
{{ $company->name }} <br>
{{ $company->description }} <br>

<form action="{{ route('companies.destroy',['company'=>$company->id]) }}" method="POST">
    @csrf
    @method("DELETE")
    <button type="submit">Delete the company</button>
</form>

<form action="{{ route('companies.edit',['company'=>$company->id]) }}" method="get">
    @csrf
    <button type="submit">Update the company</button>
</form>
