<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Price;
use App\ProductStore;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::all()->take(10);
        return $prices;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Price::class);
        if ($response->allowed()){
            return view('layouts.price.create',
            [
                'productStores'=>ProductStore::all(),
                'currencies'=>Currency::all(),
                'units'=>Unit::all(),
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
        $response = Gate::inspect('create', Price::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'value'=>'bail|required|numeric',
                'enabled'=>'bail|boolean',
                'enabled_at'=>'bail|date',
                'disabled_at'=>'bail|date',
                'quantity'=>'bail|required|numeric',
                'product_store_id'=>'bail|required|numeric',
                'currency_id'=>'bail|required|numeric',
                'unit_id'=>'bail|required|numeric',
            ]);

            // Store in database

            $productStore= ProductStore::where('id', $request['product_store_id'])->first();
            if ($productStore == null) {
                return ;
            }

            $currency= Currency::where('id', $request['currency_id'])->first();
            if ($currency == null) {
                return ;
            }

            $unit= Unit::where('id', $request['unit_id'])->first();
            if ($unit == null) {
                return ;
            }
            $price = new Price(
                [
                    'value'=>$request['value'],
                    'quantity'=>$request['quantity'],
                    'enabled'=>$request['enabled']==null?1:$request['enabled'],
                    'inserted_by'=>Auth::id(),
                    'unit_id'=>$unit->id,
                    'currency_id'=>$currency->id,
                    'product_store_id'=>$productStore->id,
                    'enabled_at'=>now(),
                ]
            );

            // Do something after creating brand
            return $this->show($price);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function show(Price $price)
    {
        $response = Gate::inspect('view', $price);
        if ($response->allowed()) {
            return view('layouts.price.show', ['price'=>$price]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function edit(Price $price)
    {
        $response = Gate::inspect('update',$price);
        if ($response->allowed()) {
            return view('layouts.price.edit',
            [
                'price'=>$price,
                'productStores'=>ProductStore::all(),
                'currencies'=>Currency::all(),
                'units'=>Unit::all(),
            ]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Price $price)
    {
        $response = Gate::inspect('update',$price);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'value'=>'nullable|numeric',
                'enabled'=>'nullable|boolean',
                'enabled_at'=>'nullable|date',
                'disabled_at'=>'nullable|date',
                'quantity'=>'nullable|numeric',
                'product_store_id'=>'nullable|numeric',
                'currency_id'=>'nullable|numeric',
                'unit_id'=>'nullable|numeric',
            ]);

            if ($request->has('value') && $request['value']) {
                $price->value = $request['value'];
            }
            if ($request->has('enabled') && $request['enabled']) {
                $price->enabled = $request['enabled'];
            }
            if ($request->has('enabled_at') && $request['enabled_at']) {
                $price->enabled_at = $request['enabled_at'];
            }
            if ($request->has('disabled_at') && $request['disabled_at']) {
                $price->disabled_at = $request['disabled_at'];
            }
            if ($request->has('quantity') && $request['quantity']) {
                $price->quantity = $request['quantity'];
            }
            if ($request->has('product_store_id') && $request['product_store_id']) {
                $price->product_store_id = $request['product_store_id'];
            }
            if ($request->has('currency_id') && $request['currency_id']) {
                $price->currency_id = $request['currency_id'];
            }
            if ($request->has('unit_id') && $request['unit_id']) {
                $price->unit_id = $request['unit_id'];
            }

            // Store in database
            $price->save();

            // Do something after creating price
            return $this->show($price);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Price  $price
     * @return \Illuminate\Http\Response
     */
    public function destroy(Price $price)
    {
        $response = Gate::inspect('delete',$price);
        if ($response->allowed()){
            $price->delete();
           // Return to dashboard with a message
           return redirect()->route('home');
        }else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function forceDelete(Price $price)
    {
        $response = Gate::inspect('forceDelete',$price);
        if ($response->allowed()){
            $price->forceDelete();
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
    public function restore( $id)
    {
        $price = Price::withTrashed()->find($id);
        $response = Gate::inspect('restore',$price);
        if ($response->allowed()){
            // Do some restore
            $price->restore();
        }
        else{
            echo $response->message();
        }
    }
}
