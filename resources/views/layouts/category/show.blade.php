

@extends('layouts.app-hanouti')

@section('title-page')
{{ $category->name }}
@endsection

@section('links')
    {{--  Including navigation style --}}
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">

    {{--  Including productcontainer Style --}}
    <link rel="stylesheet" href="{{asset('css/product-container.css')}}">

@endsection




@section('main-content')
    {{--  Including navigation Content --}}
    @include('layouts.navigation')

    {{--  Including Product container 1 Content --}}
    @if (count($products)>0)
        @include('layouts.product-container-2',['products'=>$products, 'title'=> $category->name ])
    @endif

@endsection








@section('scripts-links')
    {{--  Including navigation Scripts --}}
    <script src="{{asset('js/navigation.js')}}"></script>

    {{--  Including product-container Scripts --}}
    <script src="{{asset('js/product-container.js')}}"></script>

@endsection
