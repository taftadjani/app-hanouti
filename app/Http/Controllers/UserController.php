<?php

namespace App\Http\Controllers;

use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myStores()
    {
        if (Auth::check()) {
            return Auth::user()->stores;
        }else {
            return "not connected";
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function myCompanies()
    {
        if (Auth::check()) {
            return Auth::user()->companies;
        }else {
            return "not connected";
        }
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function becomeSeller($id)
    {
        if (Auth::check()) {
            $seller_role = Role::where('reference', config('app.role.seller'))->first();
            Auth::user()->roles()->attach($seller_role);
            return redirect()->route('home');
        }else {
            return "not connected";
        }
    }
}
