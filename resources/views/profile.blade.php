@extends('layouts.app-hanouti')

@section('title-page')
    Profile
@endsection

@section('links')
    {{--  Navigation  --}}
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">

    {{--  User details  --}}
    <link rel="stylesheet" href="{{ asset('css/user-details.css') }}">

    {{--  footer  --}}
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">
@endsection

@section('main-content')
    {{--  Navigation  --}}
    @include('layouts.navigation')

    {{--  User details  --}}
    @include('layouts.user-details')

    {{--  footer  --}}
    @include('layouts.footer')
@endsection

@section('scripts-links')
    {{--  Navigation  --}}
    <script src="{{asset('js/navigation.js')}}"></script>

    {{--  User details  --}}
    <script src="{{asset('js/user-details.js')}}"></script>

    {{--  footer  --}}
    <script src="{{asset('js/footer.js')}}"></script>
@endsection
