

@extends('layouts.app-hanouti')
@section('title-page')
{{ $title}}

@endsection

@section('links')
    {{--  Including productcontainer Style --}}
    <link rel="stylesheet" href="{{asset('css/product-container.css')}}">
@endsection




@section('main-content')
    {{--  Including Product container 1 Content --}}
    @if (count($products)>0)
        @include('layouts.product-container-2',['products'=>$products, 'title'=> $title])
    @endif
@endsection








@section('scripts-links')
    {{--  Including product-container Scripts --}}
    <script src="{{asset('js/product-container.js')}}"></script>
@endsection
