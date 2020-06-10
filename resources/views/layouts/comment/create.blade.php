<form action="{{ route('comments.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="text" name="content" required placeholder="content"><br>
    <select name="commentable_type">
        <option value="post">post</option>
        <option value="store">store</option>
        <option value="product_store">product_store</option>
        <option value="user">user</option>
        <option value="company">company</option>
    </select><br>
    <select name="commentable_id">
        <option value="1" data-type="user">user first and last name</option>
        <option value="1" data-type="store">store name</option>
        <option value="2" data-type="product_store">product_store name</option>
        <option value="1" data-type="company">company name</option>
        <option value="3" data-type="company">company name</option>
    </select><br>
    <button type="submit">Create comment</button>
</form>
