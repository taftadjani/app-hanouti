@extends('admin-seller')

@section('title-page')
    Hanouti, welcome!
@endsection

@section('links')
    {{--  Including navigation style --}}
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">

    {{--  Including Hero Style --}}
    <link rel="stylesheet" href="{{asset('css/hero.css')}}">

    {{--  Including shop by categories Style --}}
    <link rel="stylesheet" href="{{asset('css/shop-by-categories.css')}}">

    {{--  Including PUB Style --}}
    <link rel="stylesheet" href="{{asset('css/pub.css')}}">

    {{--  Including productcontainer Style --}}
    <link rel="stylesheet" href="{{asset('css/product-container.css')}}">

    {{--  Including footer style --}}
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">

@endsection




@section('main-content')
    {{--  Including navigation Content --}}
    @include('layouts.navigation')

    {{--  Including hero Content --}}
    @include('layouts.hero')

    {{--  Including shop by categories Content --}}
    @include('layouts.shop-by-categories')

    {{--  Including Product container 1 Content --}}
    @include('layouts.product-container-1',['products'=>$collections, 'title'=>"Collections"])

    {{--  Including Pub Content --}}
    @include('layouts.pub-1')

    {{--  Including Product container 1 Content --}}
    @include('layouts.product-container-1',['products'=>$recommendeds,'title'=>"Recommended"])

    {{--  Including Pub Content --}}
    @include('layouts.pub-2')

        {{--  Including Product container 1 Content --}}
        @include('layouts.product-container-1',['products'=>$highTech,'title'=>"High tech and gadget"])

    {{--  Including footer Content --}}
    @include('layouts.footer')
@endsection








@section('scripts-links')
    {{--  Including navigation Scripts --}}
    <script src="{{asset('js/navigation.js')}}"></script>

    {{--  Including hero Scripts --}}
    <script src="{{asset('js/hero.js')}}"></script>

    {{--  Including product-container Scripts --}}
    <script src="{{asset('js/product-container.js')}}"></script>

    {{--  Including pub Scripts --}}
    {{--  <script src="{{asset('js/pub.js')}}"></script>  --}}

    {{--  Including shop by categories Scripts --}}
    {{--  <script src="{{asset('js/shop-by-categories.js')}}"></script>  --}}

    {{--  Including footer Scripts --}}
    <script src="{{asset('js/footer.js')}}"></script>
@endsection
