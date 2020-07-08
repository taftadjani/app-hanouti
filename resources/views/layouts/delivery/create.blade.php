
@extends('layouts.app-hanouti')

@section('title-page')
    Create Delivery
@endsection

@section('links')
    {{--  Including navigation style --}}
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">
    <link rel="stylesheet" href="{{asset('css/company/create.css')}}">
@endsection

@section('main-content')
   <div class="container">
        <div class="create-company">
            <form action="{{ route('deliveries.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row title">
                    <div class="principal-title">
                        <span>Create company</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                         <div class="title">
                             <span>Company name</span>
                         </div>
                         <div class="value">
                             <input type="text" name="name" required placeholder="Name">
                         </div>
                    </div>
                    <div class="col">
                         <div class="title">
                             <span>Email</span>
                         </div>
                         <div class="value">
                             <input type="email" name="mail" required placeholder="Email">
                         </div>
                     </div>
                 </div>
                <div class="row">
                    <div class="col">
                        <div class="title">
                            <span>Description</span>
                        </div>
                        <div class="value">
                        <textarea name="description"  placeholder="description"></textarea>
                        </div>
                    </div>
                </div>

                <div class="row actions">
                    <button type="submit">
                        <span>Create company</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts-links')
    {{--  Including footer Scripts --}}
    <script src="{{asset('js/company/create.js')}}"></script>
@endsection

<form action="{{ route('deliveries.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="date" name="delivery_date" required><br>
    <textarea name="description" cols="30" rows="10"></textarea><br>
    <select name="delivery_mode_id" >
        @foreach ($deliveryModes as $deliveryMode)
            <option value="{{ $deliveryMode->id }}">{{ $deliveryMode->name }}</option>
        @endforeach
    </select>
    <button type="submit">Create delivery</button>
</form>
