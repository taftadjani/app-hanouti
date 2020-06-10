<?php

namespace App\Http\Controllers;

use App\Location;
use App\Provider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ProviderController extends Controller
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
        $providers = Auth::user()->providers;
        return $providers;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Provider::class);
        if ($response->allowed()){
            return view('layouts.provider.create');
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
                'complete_name'=>'bail|required|string|max:255',
                'description'=>'nullable|string',
            ]);


            // Store in database
            $provider = Provider::create(
                [
                    'complete_name'=>$request['complete_name'],
                    'description'=>$request['description'],
                    'inserted_by'=>Auth::id(),
                ]
            );
            // Do something after creating brand
            return $this->show($provider);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function show(Provider $provider)
    {
        $response = Gate::inspect('view', $provider);
        if ($response->allowed()) {
            return view('layouts.provider.show', ['provider'=>$provider]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function edit(Provider $provider)
    {
        $response = Gate::inspect('update',$provider);
        if ($response->allowed()) {
            return view('layouts.provider.edit',
            [
                'provider'=>$provider,
            ]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provider $provider)
    {
        $response = Gate::inspect('update',$provider);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'complete_name'=>'nullable|string|max:255',
                'description'=>'nullable|string',
            ]);
            if ($request->has('complete_name') && $request['complete_name']) {
                $provider->complete_name = $request['complete_name'];
            }
            if ($request->has('description') && $request['description']) {
                $provider->description = $request['description'];
            }

            // Store in database
            $provider->save();

            // Do something after creating provider
            return $this->show($provider);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Provider  $provider
     * @return \Illuminate\Http\Response
     */
    public function destroy(Provider $provider)
    {
        $response = Gate::inspect('delete',$provider);
        if ($response->allowed()){
            $provider->delete();
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
        $provider  = Provider::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$provider);
        if ($response->allowed()){
            $provider->forceDelete();
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
        $provider = Provider::withTrashed()->find($id);
        $response = Gate::inspect('restore',$provider);
        if ($response->allowed()){
            // Do some restore
            $provider->restore();
        }
        else{
            echo $response->message();
        }
    }
}
