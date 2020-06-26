
<div class="table-container">
    <div class="search-wrapper">
        <div id="search-root"></div>
    </div>
    <div class="table-wrapper">
        <table class="content-table table-sortable" id="data-table">
            <thead>
                <tr>
                    <th>
                        <span>Name</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                    <th>
                        <span>Store name</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                    <th class="number">
                        <span>Quantité en stock</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                    <th>
                        <span>Unité</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                    <th>
                        <span>Condition</span>
                        <span class="material-icons">unfold_more</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td><a href="{{route('productStores.show',['productStore'=>$product->id])}}" target="_blank">{{ $product->name}} </a></td>
                        <td><a href="{{ route('stores.show',['store'=>$product->store->id]) }}" target="_blank">{{ $product->store->name}}</a></td>
                        <td>{{ $product->quantity_stock}}</td>
                        <td>{{ $product->unit->name }}</td>
                        <td>{{ $product->condition->name }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
