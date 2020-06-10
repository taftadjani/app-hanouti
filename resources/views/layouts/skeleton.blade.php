@extends('layouts.app-hanouti')

@section('title-page')

@endsection

@section('links')
    <style>

    </style>
@endsection

@section('main-content')

@endsection

@section('scripts-links')
    <script>

    </script>
@endsection


<a href="{{ route('logout') }}"
    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
    {{ __('Logout') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>
