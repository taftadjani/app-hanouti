<div class="container">
    <section class="product wrapper">
        <div class="category belong no-selectable-text">
            <span class="store name">Store name</span>
            <div class="dots">
                <div class="dot"></div>
                <div class="dot"></div>
                <div class="dot"></div>
            </div>
            <span>Category</span>
            <span class="material-icons">keyboard_arrow_right</span>
            <span class="">Sub category</span>
        </div>
        <article class="product content">
            <div class="product img container">
                <div class="minis container">
                    @if (($product->images!= null && count(json_decode($product->images))<=0) || $product->images == null)
                        <div class="mini img" style="background-color:red;"></div>
                    @endif
                    @if ($product->images &&count(json_decode($product->images))>=1)
                        @foreach (json_decode($product->images) as $image)
                            <div class="mini img">
                                <img src="{{ url('/uploads/images/'.$image) }}" alt="no photo">
                            </div>
                        @endforeach
                    @endif
                    @if ($product->images != null && count(json_decode($product->images))>5)
                        <div class="dots container">
                            <div class="dot"></div>
                            <div class="dot"></div>
                            <div class="dot"></div>
                        </div>
                    @endif
                </div>
                <div class="img selected " @if (($product->images!= null && count(json_decode($product->images))<=0) || $product->images == null)
                    style="background-color:red;"
                @endif>
                    @if (($product->images != null && count(json_decode($product->images))>0))
                        <img src="{{ url('/uploads/images/'.json_decode($product->images)[0]) }}" alt="No photo"/>
                    @endif
                </div>
                <div class="img actions details">
                    <div class="views no-selectable-text">
                        <span class="material-icons">remove_red_eye</span>
                        <span>50 views</span>
                    </div>
                    <div class="right">
                        <a href="#" class="material-icons share">share</a>
                        <a href="{{ route('maps.store',['id'=>$product->store->id]) }}" class="material-icons map">place</a>
                        <a href="#" class="material-icons compare">sync_alt</a>
                    </div>
                </div>
            </div>
            <div class="product details container">
                <div class="top">
                    <h3 class="title no-selectable-text">{{ $product->name }}</h3>
                    <div class="actions">
                        @auth
                            <a href="#" class="material-icons" id='add_shopping_cart'>
                                @foreach ($auth->carts[0]->cartDetails as $cartDetail)
                                    @if ($cartDetail->productStore->id ==$product->id )
                                        shopping_cart
                                    @endif
                                @endforeach
                            </a>
                            <form action="{{ route('cartDetails.store') }}" id='add_shopping_cart_form' hidden>
                                @csrf
                                <input type="number" name="cart_id" value="{{ $auth->carts[0]->id }}">
                                <input type="number" name="product_store_id" value="{{ $product->id }}">
                                <input type="number" name="unit_id" value="{{ $product->prices[0]->unit->id }}">
                                <input type="number" name="price_id" value="{{ $product->prices[0]->id }}">
                                <input type="number" name="quantity" class="quantity"
                                    value="{{ $product->prices[0]->quantity }}">
                            </form>
                            <form id='delete_shopping_cart_form' action="{{ route('cartDetails.deleteFromProduct',['cart'=>$auth->carts[0]->id,'id'=>$product->id]) }}" method="POST" hidden>
                                @csrf
                                @method("DELETE")
                            </form>
                        @endauth
                    </div>
                    <div class="reviews no-selectable-text">
                        <div class="stars">
                            <span class="material-icons">star</span>
                            <span class="material-icons">star</span>
                            <span class="material-icons">star</span>
                            <span class="material-icons">star</span>
                            <span class="material-icons">star</span>
                        </div>
                        <div class="count">33 customers reviews</div>
                    </div>
                    <div class="stock no-selectable-text"><span>In Stock</span></div>
                </div>
                <div class="center">
                    <div class="price product info">
                        <div class="title container">
                            <div class="title no-selectable-text">
                                <h4>Price</h4>
                            </div>
                            {{--  <div class="sales-off percent no-selectable-text">-20%</div>  --}}
                        </div>
                        <div class="value ">
                            <div class="now no-selectable-text">200 Dhs</div>
                            <div class="standard no-selectable-text">
                                {{$product->prices[0]->value }} {{ $product->prices[0]->currency->symbol }}
                                <span class="by"> by {{ $product->prices[0]->quantity }} {{ $product->prices[0]->unit->abbrev }}</span>
                            </div>
                        </div>
                    </div>
                    @if ($product->modele != null && count(json_decode($product->modele))>0)
                        <div class="brand product info">
                            <div class="title no-selectable-text">
                                <h4 no-selectable-text>Brand</h4>
                            </div>
                            <div class="value">
                                <a href="{{ route('brands.show',['brand'=>$product->modele[0]->brand->id]) }}">{{ $product->modele[0]->brand->name }}</a>
                            </div>
                        </div>
                    @endif
                    @if ($product->description)
                        <div class="description product info">
                            <div class="title no-selectable-text">
                                <h4>Description</h4>
                            </div>
                            <div class="value no-selectable-text">
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Maiores et numquam perferendis assumenda nesciunt quam consectetur possimus cum minus, ad veniam facilis deserunt, doloribus quia! Iusto placeat voluptatum suscipit quasi.
                                <a href="#" class="read-more">read more</a>
                            </div>
                        </div>
                    @endif
                    <div class="quantity product info ">
                        <div class="title">
                            <h4 class="no-selectable-text">Quantity</h4>
                        </div>
                        <div class="value">
                            <button class="btn minus"><div class="minus no-selectable-text"></div></button>
                            <input type="text" class="quantity" value="{{ $product->prices[0]->quantity }}">
                            <button class="btn plus ">
                                <div class="plus no-selectable-text"></div>
                                <div class="plus plus-2 no-selectable-text"></div>
                            </button>
                            <span class="by"> / {{ $product->prices[0]->unit->abbrev }}</span>
                        </div>

                    </div>
                    {{--  <div class="delivery product info">
                        <div class="title">
                            <h4 class="no-selectable-text ">Delivery</h4>
                        </div>
                        <div class="value">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Culpa accusantium, sint quae temporibus ipsam ea voluptate, unde blanditiis, exercitationem expedita reprehenderit neque mollitia? Eos ipsum necessitatibus cum perspiciatis rem consectetur?
                            <a href="#" class="read-more">read more</a>
                        </div>
                    </div>  --}}
                    {{--  <div class="payment product info">
                        <div class="title no-selectable-text">
                            <h4>Payment</h4>
                        </div>
                        <div class="value no-selectable-text">
                            <div class="card"></div>
                            <div class="card"></div>
                            <div class="card"></div>
                            <div class="card"></div>
                        </div>
                    </div>  --}}
                    {{--  <div class="colors product info">
                        <div class="title no-selectable-text">
                            <h4>Color</h4>
                        </div>
                        <div class="value no-selectable-text">
                            <a href="#" class="color"></a>
                            <a href="#" class="color"></a>
                            <a href="#" class="color"></a>
                            <a href="#" class="color"></a>
                            <a href="#" class="color"></a>
                            <div class="vertical dots">
                                <div class="dot"></div>
                                <div class="dot"></div>
                                <div class="dot"></div>
                            </div>
                        </div>
                    </div>  --}}
                    {{--  <div class="sizes product info">
                        <div class="title">
                            <h4>Size</h4>
                        </div>
                        <div class="value no-selectable-text">
                            <div class="size active "><span>S</span></div>
                            <div class="size"><span>M</span></div>
                            <div class="size deactivated"><span>L</span></div>
                            <div class="size"><span>XL</span></div>
                            <div class="size"><span>XXL</span></div>
                        </div>
                    </div>  --}}
                </div>
                <div class="bottom container">
                   @auth
                        <button class="buy-now" id="btn-buy-now">
                            <span class="no-selectable-text">Buy now</span>
                            <span class="material-icons no-selectable-text">double_arrow</span>
                        </button>
                        <a href="{{ route('carts.show',['cart'=>$auth->carts[0]->id]) }}" id="link-buy-now"></a>
                   @endauth
                </div>
            </div>
        </article>
        <div class="product details plus">
            <div class="left">
                <div class="detail no-selectable-text" id='details'>
                    <h3>Details</h3>
                    <div class="content">

                        <span class="title">Name</span>
                        <span> : </span>
                        <span class="value">{{ $product->name }}</span>

                        @if ($product->modele != null && count(json_decode($product->modele))>0)
                            <span class="title">Brand</span>
                            <span> : </span>
                            <span class="value">{{ $product->modele[0]->brand->name }}</span>
                        @endif

                        @if ($product->productStoreDetails != null && count($product->productStoreDetails)>0)
                           @foreach ( $product->productStoreDetails as $productStoreDetail)
                                <span class="title">{{ $productStoreDetail->name }}</span>
                                <span> : </span>
                                <span class="value">{{ $productStoreDetail->content_value }}</span>
                           @endforeach
                        @endif
                    </div>
                </div>

                    <div class="detail no-selectable-text" id='comments'>
                        <h3>Comments</h3>
                        <div class="content comments">

                            @if ($product->comments != null && count($product->comments)>0)
                                @foreach($product->comments as $comment)
                                    <div class="comment">
                                        <div class="the-comment">
                                            <div class="username">
                                                <div class="top">
                                                    <span class="name no-selectable-text">{{ $comment->user->first_name??''}} :</span>
                                                </div>
                                                <div class="bottom">
                                                    <button>
                                                        {{--  <span class="material-icons dynamic_feed">dynamic_feed</span>  --}}
                                                        <span class="material-icons low_priority">low_priority</span>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="comment-content">
                                                <div class="comment-value">
                                                    {{ $comment->content}}
                                                </div>
                                                <div class="date">
                                                    <span>{{ $comment->created_at}}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="sub-comments">
                                            @if ($comment->subComments != null && count($comment->subComments)>0)
                                                @foreach ($comment->subComments as $subComment)
                                                    <div class="sub-comment">
                                                        <div class="username">
                                                            <div class="top">
                                                                <span class="user-name no-selectable-text">{{ $subComment->user->first_name }} : </span>
                                                            </div>
                                                        </div>
                                                        <div class="sub-comment-content">
                                                            <div class="comment-value">
                                                                {{ $subComment->content }}
                                                            </div>
                                                            <div class="date"> {{ $subComment->created_at }}</div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            @auth
                                                <div class="sub-comment sub-comment-input">
                                                    <div>
                                                        <div class="username">
                                                            <div class="top">
                                                                <span class="user-name no-selectable-text">{{ $auth->first_name }} : </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <form action="{{ route('subComments.store')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        <textarea name="content" cols="30" rows="10"></textarea>
                                                        <input type="number" name="comment_id" hidden value="{{ $comment->id }}">
                                                        <button type="submit">
                                                            <span class="material-icons">send</span>
                                                        </button>
                                                    </form>
                                                </div>
                                            @endauth
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                           @auth
                            <div class="comment-input">
                                    <div class="username">
                                        <div class="top">
                                            <span class="user-name no-selectable-text">{{ $auth->first_name }} : </span>
                                        </div>
                                    </div>
                                    <form action="{{ route('comments.store') }}"  method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <textarea name="content" cols="30" rows="10"></textarea>
                                        <input type="number" value="{{ $product->id }}" hidden name="commentable_id">
                                        <input type="text" value="product_store" hidden name="commentable_type">
                                        <button type="submit">
                                            <span class="material-icons">send</span>
                                        </button>
                                    </form>
                                </div>
                           @endauth
                        </div>
                    </div>


                @if ($product->stars != null && count(json_decode($product->stars))>0)
                    <div class="detail no-selectable-text" id='reviews'>
                        <div class="reviews-star">
                            <h3>Reviews</h3>
                            <div class="rating">
                                <div class="rating-upper" style="width: 5%">
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                </div>
                                <div class="rating-lower">
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                </div>
                            </div>
                        </div>
                        <div class="content">
                            <div class="review">
                                <div class="username">Tafta :</div>
                                <div class="stars">
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                </div>
                            </div>
                            <div class="review">
                                <div class="username">Tafta :</div>
                                <div class="stars">
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                </div>
                            </div>
                            <div class="review">
                                <div class="username">Tafta :</div>
                                <div class="stars">
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                </div>
                            </div>
                            <div class="review">
                                <div class="username">Tafta :</div>
                                <div class="stars">
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                </div>
                            </div>
                            <div class="review">
                                <div class="username">Tafta :</div>
                                <div class="stars">
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                </div>
                            </div>
                            <div class="review">
                                <div class="username">Tafta :</div>
                                <div class="stars">
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                </div>
                            </div>
                            <div class="review">
                                <div class="username">Tafta :</div>
                                <div class="stars">
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                </div>
                            </div>
                            <div class="review">
                                <div class="username">Tafta :</div>
                                <div class="stars">
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons active">star</span>
                                    <span class="material-icons">star</span>
                                    <span class="material-icons">star</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="right">
                <a href="#details" class="active">Details</a>
                <a href="#comments">Comments</a>
                <a href="#reviews">Reviews</a>
            </div>
        </div>
    </section>
</div>
