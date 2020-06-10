@extends('layouts.app-hanouti')

@section('title-page')
    Henouti, welcome!
@endsection

@section('links')
    {{--  Including navigation style --}}
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">

    <link rel="stylesheet" href="{{asset('css/cart.css')}}">
    {{--  Including footer style --}}
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">

@endsection




@section('main-content')
    {{--  Including navigation Content --}}
    @include('layouts.navigation')

    <div class="container">

    <div class="carts-wrapper">

            <div class="cart-titles">
                @foreach ($auth->carts as $car)
                    <div class="cart-title
                    @if ($cart->id == $car->id)
                        active
                    @endif">
                        <a href="{{ route('carts.show',['cart'=>$car->id]) }}">{{ $car->name }}</a>
                    </div>
                @endforeach
            </div>
            <div class="cart-content">
                @foreach ($cart->cartDetails as $cartDetail)
                    <div class="cart-detail">
                        <div class="img-container">
                            @if ($cartDetail->productStore->images != null && count(json_decode($cartDetail->productStore->images))>0)
                                <img src="{{ url('/uploads/images/'.json_decode($cartDetail->productStore->images)[0]) }}" alt="NO PHOTO">
                            @endif
                        </div>
                        <div class="details-container">
                            <div class="left">
                                <div class="top">
                                    <div class="product-name">
                                        <span>
                                            <a href="{{ route('productStores.show',['productStore'=>$cartDetail->productStore->id]) }}">{{ $cartDetail->productStore->name }}</a>
                                        </span>
                                    </div>
                                    <div class="price">
                                        <span>{{ $cartDetail->productStore->prices[0]->value }} {{ $cartDetail->productStore->prices[0]->currency->symbol }}</span>
                                    </div>
                                </div>
                                <div class="bottom">
                                    <form action="{{ route('cartDetails.destroy',['cartDetail'=>$cartDetail->id]) }}" method="POST">
                                        @csrf
                                        @method("DELETE")
                                        <button type="submit">remove</button>
                                    </form>
                                </div>
                            </div>
                            <div class="right">
                                <form action="#">
                                    <div class="quantity">
                                        <button class="btn plus " type="submit">
                                            <span class="material-icons" >add</span>
                                        </button>
                                        <input type="text" class="quantity" value="0">
                                        <button class="btn minus" type="submit">
                                            <span class="material-icons">remove</span>
                                        </button>
                                    </div>
                                    <span class="unit">kg</span>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if (count($cart->cartDetails)>0)
                    <div class="actions">
                        <a href="{{ route('carts.clear',['cart'=>$cart->id]) }}" class="clear">clear</a>
                        <a href="{{ route('carts.order',['cart'=>$cart->id]) }}" class="order">order</a>
                    </div>
                @else
                   <div class="no-product-cart"> No product in cart</div>
                @endif
            </div>

    </div>

    </div>




    {{--  Including footer Content --}}
    @include('layouts.footer')
@endsection








@section('scripts-links')
    {{--  Including navigation Scripts --}}
    <script src="{{asset('js/navigation.js')}}"></script>

<script src="{{asset('js/cart.js')}}"></script>

    {{--  Including footer Scripts --}}
    <script src="{{asset('js/footer.js')}}"></script>
@endsection
