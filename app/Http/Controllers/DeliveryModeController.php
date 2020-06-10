<?php

namespace App\Http\Controllers;

use App\DeliveryMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeliveryModeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $deliveryMode = DeliveryMode::all();
        return $deliveryMode;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', DeliveryMode::class);
        if ($response->allowed()){
            return view('layouts.deliveryMode.create');
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
        $response = Gate::inspect('create', DeliveryMode::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'description'=>'string|nullable',
            ]);

            // Store in database
            $deliveryMode = DeliveryMode::create(
                [
                    'name'=>$request['name'],
                    'description'=>$request['description'],
                ]
            );

            // Do something after creating deliveryMode
            return $this->show($deliveryMode);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DeliveryMode  $deliveryMode
     * @return \Illuminate\Http\Response
     */
    public function show(DeliveryMode $deliveryMode)
    {
        $response = Gate::inspect('view', $deliveryMode);
        if ($response->allowed()) {
            return view('layouts.deliveryMode.show', ['deliveryMode'=>$deliveryMode]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DeliveryMode  $deliveryMode
     * @return \Illuminate\Http\Response
     */
    public function edit(DeliveryMode $deliveryMode)
    {
        $response = Gate::inspect('update',$deliveryMode);
        if ($response->allowed()) {
            return view('layouts.deliveryMode.edit', ['deliveryMode'=>$deliveryMode]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DeliveryMode  $deliveryMode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DeliveryMode $deliveryMode)
    {
        $response = Gate::inspect('update',$deliveryMode);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'string|max:255|nullable',
                'description'=>'string|nullable',
            ]);
            if ($request['name']) {
                $deliveryMode->name = $request['name'];
            }
            if ($request['description']) {
                $deliveryMode->description = $request['description'];
            }

            // Store in database
            $deliveryMode->save();

            // Do something after creating deliveryMode
            return $this->show($deliveryMode);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DeliveryMode  $deliveryMode
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeliveryMode $deliveryMode)
    {
        $response = Gate::inspect('delete',$deliveryMode);
        if ($response->allowed()){
            $deliveryMode->delete();
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
        $deliveryMode  = DeliveryMode::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$deliveryMode);
        if ($response->allowed()){
            $deliveryMode->forceDelete();
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
        $deliveryMode = DeliveryMode::withTrashed()->find($id);
        $response = Gate::inspect('restore',$deliveryMode);
        if ($response->allowed()){
            // Do some restore
            $deliveryMode->restore();
        }
        else{
            echo $response->message();
        }
    }
}
