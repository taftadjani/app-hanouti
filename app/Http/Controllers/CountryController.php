<?php

namespace App\Http\Controllers;

use App\Country;
use App\Currency;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        return $countries;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Country::class);
        if ($response->allowed()){
            return view('layouts.country.create', ['currencies'=>Currency::all()]);
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
        $response = Gate::inspect('create', Country::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'currency_id'=>'bail|required|numeric',
                'phone_indicatif'=>'string|max:255|nullable',
            ]);

            // Get related datas
            $currency=Currency::where('id',$request['currency_id'])->first();
            if ($currency == null) {
                # code...
            }

            $country = Country::create(
                [
                    'name'=>$request['name'],
                    'currency_id'=>$currency->id,
                ]
            );

            if ($request->has('phone_indicatif') && $request['phone_indicatif']) {
                $country->phone_indicatif=$request['phone_indicatif'];
            }

            // Store in database
            $country->save();

            // Do something after creating brand
            return $this->show($country);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        $response = Gate::inspect('view', $country);
        if ($response->allowed()) {
            return view('layouts.country.show', ['country'=>$country]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        $response = Gate::inspect('update',$country);
        if ($response->allowed()) {
            return view('layouts.country.edit', ['country'=>$country,'currencies'=>Currency::all()]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        $response = Gate::inspect('update',$country);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'string|max:255|nullable',
                'currency_id'=>'numeric|nullable',
                'phone_indicatif'=>'string|max:255|nullable',
            ]);

            if ($request->has('name') && $request['name']) {
                $country->name = $request['name'];
            }

            if ($request->has('currency_id') && $request['currency_id']) {
                $country->currency_id = $request['currency_id'];
            }

            if ($request->has('phone_indicatif') && $request['phone_indicatif']) {
                $country->phone_indicatif = $request['phone_indicatif'];
            }

            // Store in database
            $country->save();

            // Do something after creating country
            return $this->show($country);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $response = Gate::inspect('delete',$country);
        if ($response->allowed()){
            $country->delete();
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
    public function forceDelete($id)
    {
        $country  = Country::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$country);
        if ($response->allowed()){
            $country->forceDelete();
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
        $country = Country::withTrashed()->find($id);
        $response = Gate::inspect('restore',$country);
        if ($response->allowed()){
            // Do some restore
            $country->restore();
        }
        else{
            echo $response->message();
        }
    }
}
