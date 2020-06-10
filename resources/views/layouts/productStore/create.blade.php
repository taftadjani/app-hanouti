<div class="product-store-create">
    <form action="{{ route('productStores.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="container-content">
            <div class="container-value">
                <div class="title">
                    <span class="no-selectable-text">Category</span>
                </div>
                <div class="value">
                    <select name="category_ids[]" id="category_ids" multiple required class="multiple">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" >{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="container-value">
                <div class="title">
                    <span class="no-selectable-text ">Sub Category</span>
                </div>
                <div class="value">
                    <select name="sub_category_ids[]" id="category_ids" multiple required class="multiple">
                        @foreach ($subCategories as $subCategory)
                            <option value="{{ $subCategory->id }}" >{{ $subCategory->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="container-content">
            <div class="container-value">
                <div class="title">
                    <span class="no-selectable-text ">Store</span>
                </div>
                <div class="value">
                    <select name="store_id" required>
                        @foreach ($stores as $store)
                            <option value="{{ $store->id }}" >{{ $store->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="container-value">
                <div class="title">
                    <span class="no-selectable-text">Reference</span>
                </div>
                <div class="value">
                    <select name="reference">
                        @foreach ($products as $product)
                            <option value="{{ $product->reference }}">{{ $product->reference }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="container-content">
            <div class="container-value">
                <div class="title">
                    <span class="no-selectable-text ">Product name</span>
                </div>
                <div class="value">
                    <input type="text" required name="name" placeholder="Product name">
                </div>
            </div>

            <div class="container-value">
                <div class="title">
                    <span class="no-selectable-text">Condition</span>
                </div>
                <div class="value">
                    <select name="condition_id" required>
                        @foreach ($conditions as $condition)
                            <option value="{{ $condition->id }}">{{ $condition->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="container-content">
            <div class="container-value quantity-stock">
                <div class="title">
                    <span class="no-selectable-text ">Quantity en stock</span>
                </div>
                <div class="value">
                    <input type="number" name="quantity_stock" required value="0" min="0">
                    <select name="stock_unit_id" required>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->abbrev }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="container-content">
            <div class="container-value">
                <div class="title">
                    <span class="no-selectable-text ">Desccription</span>
                </div>
                <div class="value">
                    <textarea name="description" placeholder="Description"></textarea>
                </div>
            </div>
            <div class="container-value">
                <div class="title">
                    <span class="no-selectable-text ">Keywords</span>
                </div>
                <div class="value">
                    <textarea name="keywords" placeholder="Ex : shoe,handmade"></textarea>
                </div>
            </div>
        </div>

        <div class="container-content">
            <div class="container-value price">
                <div class="title">
                    <span class="no-selectable-text ">Price</span>
                </div>
                <div class="value">
                    <input type="number" name="price_value" placeholder="Price" value="9" required>
                    <select name="currency_id" required>
                        @foreach ($currencies as $currency)
                            <option value="{{ $currency->id }}">{{ $currency->symbol }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="container-value quantity">
                <div class="title">
                    <span>Quantity</span>
                </div>
                <div class="value">
                    <input type="number" name="price_quantity" placeholder="Quantity" required value="44">
                    <select name="price_quantity_unit_id" required>
                        @foreach ($units as $unit)
                            <option value="{{ $unit->id }}">{{ $unit->abbrev }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="container-multiple-content">
            <div class="container-multiple-value">
                <input type="checkbox" name="have_return" id="have_return">
                <label for="have_return" class="no-selectable-text">have_return</label>
            </div>

            <div class="container-multiple-value">
                <input type="checkbox" name="visible_on_store" id="visible_on_store">
                <label for="visible_on_store" class="no-selectable-text">visible_on_store</label>
            </div>

            <div class="container-multiple-value">
                <input type="checkbox" name="negociable" id="negociable">
                <label for="negociable" class="no-selectable-text ">negociable</label>
            </div>

            <div class="container-multiple-value">
                <input type="checkbox" name="is_liquid" id="is_liquid">
                <label for="is_liquid" class="no-selectable-text ">is_liquid</label>
            </div>
        </div>

        <div class="container-detail">
            <div class="title">
                <span class="no-selectable-text ">Details</span>
                <button id='detail-add-btn'>
                  <span class="material-icons">add</span>
                </button>
            </div>

            <div class="value" id="detail-content-value">
                <div class="detail-content">
                    <div class="detail-title">
                        <input type="text" placeholder="Detail name" name="detail_name_1" required value="">
                    </div>

                    <div class="detail-value">
                        <input type="text" placeholder="detail value " name="detail_value_1" required value="">
                        <button class="detail-delete-btn">
                            <span class="material-icons">delete</span>
                        </button>
                    </div>
                </div>
                <input type="number" name="details_number" value="1" hidden id="details_number">
            </div>
        </div>

        <div class="img-container">
            <input type="file" name="images[]" multiple>
        </div>

        <div class="actions">
            <button type="reset">
                <span class="no-selectable-text ">Clear all</span>
            </button>

            <button type="submit">
              <span class="no-selectable-text ">Submit</span>
            </button>
        </div>

    </form>
</div>
