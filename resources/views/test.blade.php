<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test</title>
    <link rel="stylesheet" href="{{ asset('css/style-default.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin-page/product-store-list.css') }}">
</head>
<body>
    <div class="table-container">
        <div class="search-wrapper">
            <div id="search-root"></div>
        </div>
        <div class="table-wrapper">
            <table class="content-table table-sortable" id="data-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Store name</th>
                        <th>Quantity en stock</th>
                        <th>Unity</th>
                        <th>Condition</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Product name</td>
                        <td>My Store name</td>
                        <td>Quantity stock</td>
                        <td>Unit</td>
                        <td>New</td>
                    </tr>
                    <tr class="active-row">
                        <td>Product name</td>
                        <td>The ptore name</td>
                        <td>Quantity stock</td>
                        <td>Unit</td>
                        <td>New</td>
                    </tr>
                    <tr>
                        <td>Product name</td>
                        <td>Store name</td>
                        <td>Quantity stock</td>
                        <td>Unit</td>
                        <td>New</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <script src="{{ asset('js/admin-page/product-store-list.js') }}"> </script>
</body>
</html>
