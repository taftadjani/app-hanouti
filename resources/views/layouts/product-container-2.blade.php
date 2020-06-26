<div class="container">
    <div class="products-cart">
        @if ($title)
            <div class="top-title-4">
                <h3>{{ $title }}</h3>
            </div>
        @endif
        <section class="products-container">
            @foreach ($products as $product)
                @if ($product->prices->count()>0)
                    <article class="product-container">
                            <a href="{{ route('productStores.show',['productStore'=>$product->id]) }}">
                                <div class="product-img" @if (!$product->images )
                                    style ="background-color:red;"
                                @endif>
                                    @if ($product->images)
                                        <img src="{{ url('/uploads/images/'.json_decode($product->images)[0]) }}" alt="NO PHOTO">
                                    @endif
                                </div>
                                <div class="product-details">
                                    <a href="{{ route('productStores.show',['productStore'=>$product->id]) }}" class="product-name">{{ $product->name }}</a>
                                    {{--  <div class="product-price off">  --}}
                                    <div class="product-price">
                                        <span class="off-price">200 DH</span>
                                        <span class="real-price">{{ $product->prices[0]->value }} {{ $product->prices[0]->currency->symbol }}</span>
                                    </div>
                                </div>
                            </a>
                        </article>
                    @endif
            @endforeach
        </section>
    </div>
</div>
