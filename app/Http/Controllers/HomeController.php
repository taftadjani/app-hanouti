<?php

namespace App\Http\Controllers;

use App\ProductStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $products=ProductStore::all();
        $collections =[];
        foreach ($products as $product) {
            if (count($product->prices)>0 && $product->quantity_stock>=$product->prices[0]->quantity) {
                $collections[]=$product;
            }
            if (count($collections)>=10 ) {
                break;
            }
        }
        $recommendeds=[];
        foreach ($products as $product) {
            if (count($product->prices)>0 && $product->quantity_stock>=$product->prices[0]->quantity) {
                $recommendeds[]=$product;
            }
            if (count($recommendeds)>=10 ) {
                break;
            }
        }
        $highTech=[];
        foreach ($products as $product) {
            if (count($product->prices)>0 && $product->quantity_stock>=$product->prices[0]->quantity) {
                $highTech[]=$product;
            }
            if (count($highTech)>=10 ) {
                break;
            }
        }
        if (Auth::check()) {
            return view('home',
                    [
                        'collections'=>$collections,
                        'recommendeds'=>$recommendeds,
                        'highTech'=>$highTech,
                        'auth'=>Auth::user()
                    ]);
            }
            else{
                return view('home',
                        [
                            'collections'=>$collections,
                            'recommendeds'=>$recommendeds,
                            'highTech'=>$highTech,
                        ]);
        }
    }
}
