<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CurrencyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currency = Currency::all();
        return $currency;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Currency::class);
        if ($response->allowed()){
            return view('layouts.currency.create');
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
        $response = Gate::inspect('create', Currency::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'symbol'=>'bail|required|string|max:255',
                'iso_code'=>'string|nullable'
            ]);
            $currency = Currency::create(
                [
                    'name'=>$request['name'],
                    'symbol'=>$request['symbol'],
                ]
            );

            if($request->has('iso_code') && $request['iso_code']){
                $currency->iso_code=$request['iso_code'];
            }

            // Store in database
            $currency->save();

            // Do something after creating currency
            return $this->show($currency);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Currency $currency)
    {
        $response = Gate::inspect('view', $currency);
        if ($response->allowed()) {
            return view('layouts.currency.show', ['currency'=>$currency]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        $response = Gate::inspect('update',$currency);
        if ($response->allowed()) {
            return view('layouts.currency.edit', ['currency'=>$currency]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $currency)
    {
        $response = Gate::inspect('update',$currency);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'max:255|nullable',
                'symbol'=>'string|max:255|nullable',
                'iso_code'=>'string|nullable'
            ]);

            if($request->has('name') && $request['name']){
                $currency->name=$request['name'];
            }

            if($request->has('symbol') && $request['symbol']){
                $currency->symbol=$request['symbol'];
            }

            if($request->has('iso_code') && $request['iso_code']){
                $currency->iso_code=$request['iso_code'];
            }

            // Store in database
            $currency->save();

            // Do something after creating currency
            return $this->show($currency);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        $response = Gate::inspect('delete',$currency);
        if ($response->allowed()){
            $currency->delete();
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
    public function forceDelete(Currency $currency)
    {
        $response = Gate::inspect('forceDelete',$currency);
        if ($response->allowed()){
            $currency->forceDelete();
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
        $currency = Currency::withTrashed()->find($id);
        $response = Gate::inspect('restore',$currency);
        if ($response->allowed()){
            // Do some restore
            $currency->restore();
        }
        else{
            echo $response->message();
        }
    }
}
