@extends('layouts.app-hanouti')

@section('title-page')
    Shop by categories
@endsection

@section('links')
    {{--  Including stores style --}}
    <link rel="stylesheet" href="{{asset('css/categories.css')}}">

@endsection

@section('main-content')
    {{--  Including stores Content --}}
    @include('layouts.category.categories')
@endsection

@section('scripts-links')

    {{--  Including stores Scripts --}}
    <script src="{{asset('js/categories.js')}}"></script>
@endsection
