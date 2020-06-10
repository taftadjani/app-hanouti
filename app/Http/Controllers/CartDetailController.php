<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartDetail;
use App\Price;
use App\ProductStore;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CartDetailController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartDetails = CartDetail::all()->take(10);
        return $cartDetails;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', CartDetail::class);
        if ($response->allowed()){
            return view('layouts.cartDetail.create',
            [
                'units'=>Unit::all(),
                'productStores'=>ProductStore::all(),
                'prices'=>Price::all(),
                'carts'=>Cart::where('user_id', Auth::id())->get(),
            ]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request;
        $response = Gate::inspect('create', CartDetail::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'cart_id'=>'bail|required|numeric',
                'product_store_id'=>'bail|required|numeric',
                'unit_id'=>'bail|required|numeric',
                'price_id'=>'bail|required|numeric',
                'quantity'=>'bail|required|numeric',
            ]);

            // Get related datas
            $cart=Cart::where('id',$request['cart_id'])
                        ->where('user_id', Auth::id())
                        ->first();
            if ($cart == null) {
                # code...
                return 'no cart';
            }

            $productStore = ProductStore::where('id',$request['product_store_id'])->first();
            if ($productStore == null) {
                # code...
                return 'no productStore';
            }

            $price = ProductStore::where('id',$request['product_store_id'])->first()->prices->where('id', $request['price_id'])->first();
            if ($price == null) {
                # code...
                return 'no price';
            }

            $unit = Unit::where('id',$request['unit_id'])
                                    ->first();
            if ($unit == null) {
                # code...
                return 'no unit';
            }

            if ($productStore->quantity_stock < $request['quantity']) {
                # code...
                return "Less quantity";
            }

            // Verify if the product is already inserted
            foreach ($cart->cartDetails as $cartDetail) {
                if ($cartDetail->productStore->id == $productStore->id) {
                    return false;
                }
            }
            // Store in database
            $cartDetail = CartDetail::create(
                [
                    'quantity'=>$request['quantity'],
                    'cart_id'=>$cart->id,
                    'product_store_id'=>$productStore->id,
                    'unit_id'=>$unit->id,
                    'price_id'=>$price->id,
                ]
            );

            // Do something after creating brand
            return true;
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CartDetail $cartDetail)
    {
        $response = Gate::inspect('view', $cartDetail);
        if ($response->allowed()) {
            return view('layouts.cartDetail.show', ['cartDetail'=>$cartDetail]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CartDetail $cartDetail)
    {
        $response = Gate::inspect('update',$cartDetail);
        if ($response->allowed()) {
            return view('layouts.cartDetail.edit',
            [
                'cartDetail'=>$cartDetail,
                'units'=>Unit::all(),
                'productStores'=>ProductStore::all(),
                'prices'=>Price::all(),
                'carts'=>Cart::where('user_id',Auth::id())->get()
            ]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CartDetail $cartDetail)
    {
        $response = Gate::inspect('update',$cartDetail);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'cart_id'=>'bail|required|numeric',
                'product_store_id'=>'bail|required|numeric',
                'unit_id'=>'bail|required|numeric',
                'price_id'=>'bail|required|numeric',
                'quantity'=>'bail|required|numeric',
            ]);

            if ($request->has('cart_id') && $request['cart_id']) {
                $cart=Cart::where('id',$request['cart_id'])
                    ->where('user_id', Auth::id())
                    ->first();
                if ($cart) {
                    $cartDetail->cart_id = $cart->id;
                }
            }
            if ($request->has('product_store_id') && $request['product_store_id']) {
                $product_store=ProductStore::where('id',$request['product_store_id'])
                                            ->first();
                if ($product_store) {
                    $cartDetail->product_store_id = $product_store->id;
                }
            }

            $price = ProductStore::where('id',$request['product_store_id'])->first()->prices->where('id', $request['price_id'])->first();
            if ($price == null) {
                # code...
                return 'no price';
            }

            if ($request->has('unit_id') && $request['unit_id']) {
                $unit=Unit::where('id',$request['unit_id'])
                                            ->first();
                if ($unit) {
                    $cartDetail->unit_id = $unit->id;
                }
            }
            if ($request->has('quantity') && $request['quantity']) {
                if ($productStore->quantity < $request['quantity']) {
                    # code...
                    return "Less quantity";
                }
                $cartDetail->quantity = $request['quantity'];
            }

            // Store in database
            $cartDetail->save();

            // Do something after creating cartDetail
            return $this->show($cartDetail);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartDetail $cartDetail)
    {
        $response = Gate::inspect('delete',$cartDetail);
        if ($response->allowed()){
            $cartDetail->delete();
           // Return to dashboard with a message
           return redirect()->route('home');
        }else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\CartDetail  $cartDetail
     * @return \Illuminate\Http\Response
     */
    public function deleteFromProduct(Cart $cart, $id)
    {
        $user=Auth::user();

        if ($cart->user->id != $user->id) {
            # code...
        }
        foreach ($cart->cartDetails as $cartDetail) {
            if ($cartDetail->productStore->id == $id) {
               $this->destroy($cartDetail);
               return "cool";
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(CartDetail $cartDetail)
    {
        $response = Gate::inspect('forceDelete',$cartDetail);
        if ($response->allowed()){
            $cartDetail->forceDelete();
            // Return to dashboard with a message
            return redirect()->route('home');
        }else{
            echo $response->message();
        }
    }

    /**
     * Determine whether the user can restore the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function restore($id)
    {
        $cartDetail = Cart::withTrashed()->find($id);
        $response = Gate::inspect('restore',$cartDetail);
        if ($response->allowed()){
            // Do some restore
            $cartDetail->restore();
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Determine whether the user can updateQuantity of the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function updateQuantity(Request $request, CartDetail $cartDetail)
    {
        $response = Gate::inspect('update', $cartDetail);
        if ($response->allowed()){
            // Do some update-quantity
            // Validate data
            $request->validate([
                'quantity'=>'bail|required|numeric',
            ]);

            if ($request['quantity'] < 0) {
                # code...
                return ;
            }
            if ($productStore->quantity < $request['quantity']) {
                # code...
                return "Less quantity";
            }
            $cartDetail->quantity = $request['quantity'];
            $cartDetail->save();
        }
        else{
            echo $response->message();
            return $request["quantity"]+10000;
        }
    }
}
