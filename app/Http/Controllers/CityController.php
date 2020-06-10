<?php

namespace App\Http\Controllers;

use App\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cities = City::all()->take(10);
        return $cities;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', City::class);
        if ($response->allowed()){
            return view('layouts.city.create', ['countries'=>Country::all()]);
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
        $response = Gate::inspect('create', City::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'country_id'=>'bail|required|numeric',
                'name'=>'bail|required|string|max:255',
                'lng'=>'numeric|nullable',
                'lat'=>'numeric|nullable',
            ]);
            // Store in database
            $city = City::create(
                [
                    'name'=>$request['name'],
                    'country_id'=>$request['country_id'],
                ]
            );

            if ($request->has('lng') && $request['lng']) {
                $city->lng=$request['lng'];
            }

            if ($request->has('lat') && $request['lat']) {
                $city->lat=$request['lat'];
            }

            // Do something after creating city
            return $this->show($city);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $response = Gate::inspect('view', $city);
        if ($response->allowed()) {
            return view('layouts.city.show', ['city'=>$city]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $response = Gate::inspect('update',$city);
        if ($response->allowed()) {
            return view('layouts.city.edit', ['city'=>$city,'countries'=>Country::all()]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        $response = Gate::inspect('update',$city);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'country_id'=>'numeric|nullable',
                'name'=>'string|max:255|nullable',
                'lng'=>'numeric|nullable',
                'lat'=>'numeric|nullable',
            ]);

            if ($request->has('country_id') && $request['country_id']) {
                $city->country_id=$request['country_id'];
            }

            if ($request->has('name') && $request['name']) {
                $city->name=$request['name'];
            }

            if ($request->has('lng') && $request['lng']) {
                $city->lng=$request['lng'];
            }

            if ($request->has('lat') && $request['lat']) {
                $city->lat=$request['lat'];
            }
            // Store in database
            $city->save();

            // Do something after creating city
            return $this->show($city);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $city = City::withTrashed()->find($id);
        $response = Gate::inspect('delete',$city);
        if ($response->allowed()){
            $city->delete();
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
    public function forceDelete(City $city)
    {
        $response = Gate::inspect('forceDelete',$city);
        if ($response->allowed()){
            $city->forceDelete();
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
        $city = City::withTrashed()->find($id);
        $response = Gate::inspect('restore',$city);
        if ($response->allowed()){
            // Do some restore
            $city->restore();
        }
        else{
            echo $response->message();
        }
    }
}
