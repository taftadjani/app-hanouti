<?php

namespace App\Http\Controllers;

use App\Delivery;
use App\DeliveryMode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Delivery::class);
        if ($response->allowed()){
            return view('layouts.delivery.create',['deliveryModes'=>DeliveryMode::all()]);
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
        $response = Gate::inspect('create', Delivery::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'delivery_mode_id '=>'bail|required|numeric',
                'delivery_date'=>'bail|required|date',
                'description'=>'string|nullable',
            ]);
            $deliveryMode = Delivery::where('id', $request['delivery_mode_id'])->first();
            if ($deliveryMode == null) {
                # code...
            }

            $delivery = Delivery::create(
                [
                    'name'=>$request['name'],
                    'delivery_mode_id'=>$deliveryMode->id,
                    'user_id'=>Auth::id()
                ]
            );

            if($request->has('description') && $request['description']){
                $delivery->description = $request['description'];
            }

            // Store in database
            $delivery->save();

            // Do something after creating delivery
            return $this->show($delivery);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show(Delivery $delivery)
    {
        $response = Gate::inspect('view', $delivery);
        if ($response->allowed()) {
            return view('layouts.delivery.show', ['delivery'=>$delivery]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function edit(Delivery $delivery)
    {
        $response = Gate::inspect('update',$delivery);
        if ($response->allowed()) {
            return view('layouts.delivery.edit', ['delivery'=>$delivery,'deliveryModes'=>DeliveryMode::all()]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
        $response = Gate::inspect('update',$delivery);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'delivery_mode_id '=>'numeric|nullable',
                'delivery_date'=>'date|nullable',
                'description'=>'string|nullable',
            ]);

            if ($request->has('delivery_mode_id') && $request['delivery_mode_id']) {
                $delivery->delivery_mode_id = $request['delivery_mode_id'];
            }

            if ($request->has('delivery_date') && $request['delivery_date']) {
                $delivery->delivery_date = $request['delivery_date'];
            }

            if ($request->has('description') && $request['description']) {
                $delivery->description = $request['description'];
            }

            // Store in database
            $delivery->save();

            // Do something after creating delivery
            return $this->show($delivery);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
        $response = Gate::inspect('delete',$delivery);
        if ($response->allowed()){
            $delivery->delete();
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
        $delivery  = Delivery::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$delivery);
        if ($response->allowed()){
            $delivery->forceDelete();
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
        $delivery = Delivery::withTrashed()->find($id);
        $response = Gate::inspect('restore',$delivery);
        if ($response->allowed()){
            // Do some restore
            $delivery->restore();
        }
        else{
            echo $response->message();
        }
    }
}
