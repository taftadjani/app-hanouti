@extends('layouts.app-hanouti')

@section('title-page')
    Hanouti, welcome!
@endsection

@section('links')
    {{--  Including navigation style --}}
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">

    <style>
        .map-container{
            width: 100%;
            margin: 2rem 0;
        }

        .map-container .map-title{
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            margin-bottom: 2rem;

        }

        .map-container .map-title span{
            font-size: 2.5rem;
            font-weight: 600;
        }

        #map{
            height: 60vh;
            background-color: red;
            margin: 1rem 0;
            border-radius: .5rem
        }
    </style>

    {{--  Including footer style --}}
    <link rel="stylesheet" href="{{asset('css/footer.css')}}">

@endsection




@section('main-content')
    {{--  Including navigation Content --}}
    @include('layouts.navigation')

    <div class="container">
        <div class="map-container">
            <div class="map-title">
                <span>
                    Map of stores
                </span>
            </div>
            <div id="map"></div>
            <div class="map-actions">

            </div>
        </div>
    </div>

    {{--  Including footer Content --}}
    @include('layouts.footer')
@endsection








@section('scripts-links')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBCVUW3OYxzfwg_zB7NyDuHAqtnCSlfxEo&libraries=places"
            async
            defer></script>
    <script src="{{ asset('js/map.js') }}"></script>

    {{--  Including navigation Scripts --}}
    <script src="{{asset('js/navigation.js')}}"></script>
    {{--  Including footer Scripts --}}
    <script src="{{asset('js/footer.js')}}"></script>
@endsection
