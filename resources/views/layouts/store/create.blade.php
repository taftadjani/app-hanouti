@extends('layouts.app-hanouti')

@section('title-page')
    Create store
@endsection

@section('links')
    {{--  Including navigation style --}}
    <link rel="stylesheet" href="{{asset('css/navigation.css')}}">
    <link rel="stylesheet" href="{{asset('css/store/create.css')}}">
@endsection

@section('main-content')
   <div class="container">
        <div class="create-store">
            <form action="{{ route('stores.store') }}" method="POST"  enctype="multipart/form-data">
                @csrf
                <div class="row title">
                    <div class="principal-title">
                        <span>Create store</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="title">
                            <span>Store name</span>
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
                            <input type="email" name="mail" placeholder="mail">
                        </div>
                    </div>
                </div>
                <div class="row belong-to">
                    <div class="col">
                        <div class="title">
                            <span>Belong to </span>
                        </div>
                        <div class="value">
                            <select name="storeable_type" class="storeable_type" id="storeable_type">
                                <option value="user" data-type="user" selected>Belong to a person</option>
                                @if ($auth->companies->count()>0)
                                    <option value="company" data-type="company">Belong to an entreprise  </option>
                                @endif
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <select name="storeable_id" class="storeable_id" id="storeable_id">
                            <option value="{{ $auth->id }}" data-type="user">{{ $auth->first_name }} {{ $auth->last_name }}</option>
                            @if ($auth->companies->count()>0)
                                @foreach ($auth->companies as $key=>$company)
                                    <option value="{{ $company->id }}" data-type="company"
                                        @if ($key == 0)
                                            selected
                                        @endif >  {{ $company->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="title">
                            <span>Default currency</span>
                        </div>
                        <div class="value">
                            <select name="currency_id" >
                                @foreach ($currencies as $currency)
                                    <option value="{{ $currency->id }}" >{{ $currency->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="title">
                            <span>Images</span>
                        </div>
                        <div class="value">
                            <input type="file" name="cover" multiple>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="title">
                            <span>Description</span>
                        </div>
                        <div class="value">
                            <textarea name="description" cols="30" rows="10" placeholder="Description"></textarea>
                        </div>
                    </div>
                    <div class="col">
                        <div class="title">
                            <span>Keywords</span>
                        </div>
                        <div class="value">
                            <textarea name="keywords" cols="30" rows="10" placeholder="Keywords"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row actions">

                    <button type="submit">
                        <span>Save</span>
                    </button>
                </div>
            </form>
        </div>
   </div>
@endsection

@section('scripts-links')
    {{--  Including footer Scripts --}}
    <script src="{{asset('js/store/create.js')}}"></script>
@endsection
