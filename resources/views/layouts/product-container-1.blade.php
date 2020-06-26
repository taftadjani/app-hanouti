<div class="container">
    <!-- Start of top title 1 -->
    <div class="products-cart">
        @if ($title)
            <div class="top-title-1 no-selectable-text">
                <h3>{{ $title }}</h3>
            </div>
        @endif
        <section class="center products-container">
            @foreach ($products as $product)
                @if ($product->prices->count()>0)
                    <article class="product-container">
                        <a href="{{ route('productStores.show',['productStore'=>$product->id]) }}">
                            <div class="product-img">
                                @if ($product->images != null && count(json_decode($product->images))>0)
                                    <img src="{{ url('/uploads/images/'.json_decode($product->images)[0]) }}" alt="NO PHOTO">
                                @endif
                            </div>
                            <input type="number" class="product_id" value="{{ $product->id}}" hidden>
                            <div class="product-details">
                                <a href="{{ route('productStores.show',['productStore'=>$product->id]) }}" class="product-name">{{ $product->name }}</a>
                                {{--  <div class="product-price off">  --}}
                                <div class="product-price no-selectable-text">
                                    <span class="off-price">200 DH</span>
                                        <span class="real-price">{{ $product->prices[0]->value }} {{ $product->prices[0]->currency->symbol }}</span>
                                </div>
                            </div>
                        </a>
                    </article>
                @endif
            @endforeach
        </section>
        {{--  <div class="bottom">
            <button class="show-more">Show more <i class="rotate_right material-icons">rotate_right</i>
        </button>
        </div>  --}}
    </div>
    <!-- End of top title 1 -->

</div>
