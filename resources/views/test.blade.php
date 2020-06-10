<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
</head>
<body>
    <form action="{{ url('test') }}" method="POST">
        @csrf
        <select name="category[]" multiple="multiple" hidden>
            <option value="1" selected>Value 1</option>
            <option value="2" selected>Value 2</option>
            <option value="3" selected>Value 3</option>
            <option value="4">Value 4</option>
            <option value="5">Value 5</option>
        </select>
        <button type="submit">Submit</button>
    </form>
</body>
</html>
