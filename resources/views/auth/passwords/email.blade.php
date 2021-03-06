@extends('layouts.app-hanouti')

@section('title-page')
    Get mail
@endsection

@section('links')
    <style>
        .app-hanouti {
            background-color: var(--color-orange-primary);
        }

        .container {
            height: 100vh;
            display: flex;
            align-items: center;
        }

        .center-container {
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            align-items: center;
            width: 100%;
            height: 50rem;
            padding: 5rem 0;
            background-color: var(--color-white-primary);
            box-shadow: 2px 2px 6px rgba(0, 0, 0, .16), -2px -2px 6px rgba(0, 0, 0, .16);
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            -ms-border-radius: 5px;
            -o-border-radius: 5px;
        }

        .center-container .logo {
            display: flex;
            align-items: center;
        }

        .logo .shopping_cart {
            font-size: 4rem;
            width: 4rem;
            height: 4rem;
            color: var(--color-orange-primary);
            transform: rotate(90deg);
            -webkit-transform: rotate(90deg);
            -moz-transform: rotate(90deg);
            -ms-transform: rotate(90deg);
            -o-transform: rotate(90deg);
        }

        .logo .logo-text {
            font-family: 'Cunia';
            font-size: 3rem;
            margin-left: .5rem;
        }

        .search-box {
            position: relative;
            margin-bottom: 5rem;
            width: 50%;
            height: 5rem;
            /* overflow: hidden */
        }

        .search-box form{
            width: 100%;
            height: 100%;
            position: relative;
        }
        .search-box input {
            width: 100%;
            height: 100%;
            color: var(--color-black-primary);
            padding-top: 2rem;
            font-size: 2rem;
            letter-spacing: 1px;
            border: none;
            outline: none;
        }

        .search-box label {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
            height: 100%;
            pointer-events: none;
            border-bottom: 1px solid var(--color-black-primary);
        }

        .content-name {
            position: absolute;
            bottom: .5rem;
            left: 0rem;
            transition: all 300ms ease;
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
        }

        .search-box input:focus+.label-name .content-name,
        .search-box input:valid+.label-name .content-name {
            transform: translateY(-150%);
            font-size: 1.4rem;
            color: var(--color-orange-primary);
            -webkit-transform: translateY(-150%);
            -moz-transform: translateY(-150%);
            -ms-transform: translateY(-150%);
            -o-transform: translateY(-150%);
        }

        .search-box form>button {
            cursor: pointer;
            position: absolute;
            right: 0;
            bottom: .5rem;
            border: none;
            outline: none;
            background-color: transparent;
            z-index: 100;
            color: var(--color-orange-primary);
            transition: all 300ms ease;
            -webkit-transition: all 300ms ease;
            -moz-transition: all 300ms ease;
            -ms-transition: all 300ms ease;
            -o-transition: all 300ms ease;
        }

        .search-box form>button:active {
            outline: none;
            transform: scale(.9);
            -webkit-transform: scale(.9);
            -moz-transform: scale(.9);
            -ms-transform: scale(.9);
            -o-transform: scale(.9);
        }
    </style>
@endsection

@section('main-content')
    <div class="container">
        <div class="center-container">
            <a href="#" class="logo">
                <span><i class="shopping_cart material-icons">shopping_cart</i></span>
                <span class="logo-text">Hanouti</span>
            </a>
            <div class="search-box">
                <form id="email-form" method="POST" action="{{ route('password.email') }}" >
                    @csrf
                    <input  type="email" name="email" value="{{ old('email')}}" autocomplete="off" required autofocus>
                    <label for="email" class="label-name">
                        <span class="content-name">Email</span>
                    </label>
                    <button type="submit" class="material-icons">trending_flat</button>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts-links')

@endsection
