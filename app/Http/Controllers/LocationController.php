<?php

namespace App\Http\Controllers;

use App\City;
use App\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LocationController extends Controller
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
        $locations = Auth::user()->locations;
        return $locations;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Location::class);
        if ($response->allowed()){
            return view('layouts.location.create',
                [
                    'cities'=>City::all()
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
        $response = Gate::inspect('create', Location::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'city_id '=>'bail|required|numeric',
                'locationable_id '=>'bail|required|numeric',
                'locationable_type '=>'bail|required|string|max:255',
                'lng '=>'bail|required|numeric',
                'lat '=>'bail|required|numeric',
                'description '=>'string|nullable',
                'zip_code '=>'string|nullable',
            ]);

            // Get data
            $city = City::where('id',$request['city_id'] )->first();
            if (count(City::where('id',$request['city_id'] ))<=0 ) {
                return;
            }
            $location = Location::create(
                [
                    'inserted_by'=>Auth::id(),
                    'description'=>$request['description'],
                    'lng'=>$request['lng'],
                    'lat'=>$request['lat'],
                    'zip_code'=>$request['zip_code'],
                    'city_id'=>$city->id,
                ]
            );
            if ($request['locationable_type'] == 'product_store') {
                $location->locationable_type = 'product_store';
                $location->locationable_id = $request['locationable_id'];
            }

            if ($request['locationable_type'] == 'store') {
                $location->locationable_type = 'store';
                $location->locationable_id = $request['locationable_id'];
            }

            if ($request['locationable_type'] == 'user') {
                $location->locationable_type = 'user';
                $location->locationable_id = $request['locationable_id'];
            }

            if ($request['locationable_type'] == 'company') {
                $location->locationable_type = 'company';
                $location->locationable_id = $request['locationable_id'];
            }

            if ($request['locationable_type'] == 'provider') {
                $location->locationable_type = 'provider';
                $location->locationable_id = $request['locationable_id'];
            }

            if ($request['locationable_type'] == 'delivery') {
                $location->locationable_type = 'delivery';
                $location->locationable_id = $request['locationable_id'];
            }

            // Store in database
            $location->save();

            // Do something after creating location
            return $this->show($location);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function show(Location $location)
    {
        $response = Gate::inspect('view', $location);
        if ($response->allowed()) {
            return view('layouts.location.show', ['location'=>$location]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function edit(Location $location)
    {
        $response = Gate::inspect('update',$location);
        if ($response->allowed()) {
            return view('layouts.location.edit', ['location'=>$location]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Location $location)
    {
        $response = Gate::inspect('update',$location);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'city_id '=>'numeric|nullable',
                'locationable_id '=>'numeric|nullable',
                'locationable_type '=>'string|max:255|nullable',
                'lng '=>'numeric|nullable',
                'lat '=>'numeric|nullable',
                'description '=>'string|nullable',
                'zip_code '=>'string|nullable',
            ]);

            if ($request->has('city_id') && $request['city_id']) {
                $location->city_id = $request['city_id'];
            }

            if ($request->has('lng') && $request['lng']) {
                $location->lng = $request['lng'];
            }

            if ($request->has('lat') && $request['lat']) {
                $location->lat = $request['lat'];
            }

            if (($request->has('locationable_id') && $request['locationable_id']) &&
                ($request->has('locationable_type') && $request['locationable_type'])) {
                $location->locationable_id = $request['locationable_id'];
                $location->locationable_type = $request['locationable_type'];
            }

            if ($request->has('description') && $request['description']) {
                $location->description = $request['description'];
            }

            if ($request->has('zip_code') && $request['zip_code']) {
                $location->zip_code = $request['zip_code'];
            }

            // Store in database
            $location->save();

            // Do something after creating location
            return $this->show($location);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Location  $location
     * @return \Illuminate\Http\Response
     */
    public function destroy(Location $location)
    {
        $response = Gate::inspect('delete',$location);
        if ($response->allowed()){
            $location->delete();
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
    public function forceDelete( $id)
    {
        $location  = Location::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$location);
        if ($response->allowed()){
            $location->forceDelete();
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
        $location = Location::withTrashed()->find($id);
        $response = Gate::inspect('restore',$location);
        if ($response->allowed()){
            // Do some restore
            $location->restore();
        }
        else{
            echo $response->message();
        }
    }
}
