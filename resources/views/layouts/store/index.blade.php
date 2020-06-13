@extends('layouts.app-hanouti')

@section('title-page')
    {{ $title }}
@endsection

@section('links')
    {{--  Including stores style --}}
    <link rel="stylesheet" href="{{asset('css/stores.css')}}">

@endsection

@section('main-content')
    {{--  Including stores Content --}}
    @include('layouts.store.stores',['title'=>$title, 'stores'=>$stores])

@endsection

@section('scripts-links')

    {{--  Including stores Scripts --}}
    <script src="{{asset('js/stores.js')}}"></script>
@endsection
