@extends('layouts.app-hanouti')

@section('title-page')
    Dashboard
@endsection

@section('links')
    <link rel="stylesheet" href="{{ asset('css/admin-seller.css') }}">
@endsection

@section('main-content')
<div class="admin-container">
    <header>
        <div class="top-container">
            <div class="top">
                <div class="left">
                    <a href="{{ route('home') }}">
                        <span class="material-icons">shopping_cart</span>
                        <span>HANOUTI</span>
                    </a>
                </div>
                <div class="right">
                    <div class="search">
                        <input type="text" name="" placeholder="Type to search">
                        <a href="#">
                            <span class="material-icons">
                            search
                            </span>
                        </a>
                    </div>
                    <a href="#" class="mail">
                        <span class="material-icons">
                        mail
                        </span>
                        <div>10</div>
                    </a>
                    <a href="#" class="notif">
                        <span class="material-icons">
                        notifications
                        </span>
                        <div>10</div>
                    </a>
                    <div class="account-container">
                        <div class="img-container">
                            <!-- <img src="#" alt="logo"> -->
                        </div>
                        <div class="details">
                            <span>Taftadjani Dahirou</span>
                            <span class="material-icons">keyboard_arrow_down</span>
                            <div class="details-content">
                                <div class="logout">
                                    <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">Logout</a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bottom-container">
            <nav class="bottom">
                <div class="left">
                    <div class="nav-item active">
                        <span class="material-icons">home</span>
                        <button>Dashboard</button>
                    </div>
                    <div class="nav-item">
                        <span class="material-icons">people</span>
                        <button>Users</button>
                        <ul class="nav-content">
                            <li>
                                <a href="{{ route('users.adminIndex') }}" id="list-users-link">Get all users</a>
                            </li>
                            <li>
                                <a href="#">Add a user</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-item">
                        <span class="material-icons">store</span>
                        <button>Stores</button>
                        <ul class="nav-content">
                            <li>
                                <a href="#">Get all stores</a>
                            </li>
                            <li>
                                <a href="{{ route('stores.create') }}">Add a store</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-item">
                        <span class="material-icons">computer</span>
                        <button>Products</button>
                        <ul class="nav-content">
                            <li>
                                <a href="#">Get all products</a>
                            </li>
                            <li>
                                <a href="#">Add a product</a>
                            </li>
                        </ul>
                    </div>
                    <div class="nav-item">
                        <button>More</button>
                        <span class="material-icons">add</span>
                        <div class="nav-content more">
                            <div class="left">
                                <ul class="more-content-container">
                                    <li class="more-item">
                                        <span>Product store</span>
                                        <ul class="more-item-content" >
                                            <li>
                                                <a href="{{ route('productStores.create') }}" id="add-product-store-link">Add a new product store</a>
                                            </li>
                                            <li><a href="{{ route('productStores.adminIndex') }}" id="list-product-store-link">List of product store</a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="center"></div>
                            <div class="right"></div>
                        </div>
                    </div>
                </div>
                <div class="right">
                    <button>
                        <span class="material-icons">settings</span>
                        <span>Setting</span>
                    </button>
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="main-title" id="main-title">
            <span>Dashboard</span>
        </div>
        <div class="main-content" id="main-content">
        </div>
    </main>
</div>
@endsection

@section('scripts-links')
    <script src="{{ asset('js/admin-seller.js') }}"> </script>
@endsection
