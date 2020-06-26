@extends('layouts.app-hanouti')

@section('title-page')
    Create cart
@endsection

@section('links')
    {{--  Including navigation style --}}
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart/create.css')}}">
@endsection

@section('main-content')
   <div class="container">
        <div class="create-cart">
            <form action="{{ route('carts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row title">
                    <div class="principal-title">
                        <span>Create cart</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Cart name</span>
                         </div>
                         <div class="value">
                             <input type="text" name="name" required placeholder="Name" value="Cart">
                         </div>
                    </div>
                    <div class="col">
                         <div class="title">
                             <span>Default currency</span>
                         </div>
                         <div class="value">
                             <select name="currency_id" id="currency_id">
                                 @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}">{{ $currency->name }}</option>
                                 @endforeach
                             </select>
                         </div>
                     </div>
                 </div>
                <div class="row actions">
                    <button type="submit">
                        <span>Create cart</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts-links')
    {{--  Including footer Scripts --}}
    <script src="{{asset('js/cart/create.js')}}"></script>
@endsection

