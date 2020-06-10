<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('admin-seller', ['user'=>Auth::user()]);
})->name('admin');
