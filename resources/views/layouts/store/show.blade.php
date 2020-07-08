@extends('layouts.app-hanouti')

@section('title-page')
    {{ $store->name }}
@endsection

@section('links')
    {{--  Including navigation style --}}
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">

    {{--  Including product Style --}}
    <link rel="stylesheet" href="{{asset('css/store.css')}}">

    {{--  Including productcontainer Style --}}
    <link rel="stylesheet" href="{{asset('css/product-container.css')}}">
@endsection

@section('main-content')
    {{--  Including navigation Content --}}
    @include('layouts.navigation')

    {{--  Including Product Content --}}
    @include('layouts.store.store', compact('store'))

    {{--  Including Product container 1 Content --}}
    @include('layouts.product-container-1',['products'=>$store->productStores->take(10),'title'=>"Products from the store"])

@endsection

@section('scripts-links')
    {{--  Including navigation Scripts --}}
    <script src="{{asset('js/navigation.js')}}"></script>

    {{--  Including product Scripts --}}
    <script src="{{asset('js/store.js')}}"></script>

    {{--  Including product-container Scripts --}}
    <script src="{{asset('js/product-container.js')}}"></script>
@endsection










