@extends('layouts.app-hanouti')

@section('title-page')
    Product page
@endsection

@section('links')
    {{--  Including navigation style --}}
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">

    {{--  Including product Style --}}
    <link rel="stylesheet" href="{{asset('css/product.css')}}">

    {{--  Including footer style --}}
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">

@endsection

@section('main-content')
    {{--  Including navigation Content --}}
    @include('layouts.navigation')

    {{--  Including Product Content --}}
    @include('product')

    {{--  Including footer Content --}}
    @include('layouts.footer')
@endsection

@section('scripts-links')
    {{--  Including navigation Scripts --}}
    <script src="{{asset('js/navigation.js')}}"></script>

    {{--  Including product Scripts --}}
    <script src="{{asset('js/product.js')}}"></script>

    {{--  Including footer Scripts --}}
    <script src="{{asset('js/footer.js')}}"></script>
@endsection

