<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use App\Traits\UploadsPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PaymentMethodController extends Controller
{
    use UploadsPhotos;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $paymentMethods = PaymentMethod::all();
        return $paymentMethods;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', PaymentMethod::class);
        if ($response->allowed()){
            return view('layouts.paymentMethod.create');
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
        $response = Gate::inspect('create', PaymentMethod::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'img_path'=>'string|nullable',
                'description'=>'string|nullable'
            ]);

            $paymentMethod = PaymentMethod::create(
                [
                    'name'=>$request['name'],
                    'description'=>$request['description'],
                ]
            );

            if($request->has('img_path')){
                $img_path = $request->file('img_path');
                $extension = $img_path->getClientOriginalExtension();
                $name = $paymentMethod->id.'_'.time().'_'.$img_path->getClientOriginalName();
                $this->uploadPhoto( $img_path, $name, $extension);

                $paymentMethod['img_path']=$name.'.'.$extension;
            }

            // Store in database
            $paymentMethod->save();

            // Do something after creating paymentMethod
            return $this->show($paymentMethod);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        $response = Gate::inspect('view', $paymentMethod);
        if ($response->allowed()) {
            return view('layouts.paymentMethod.show', ['paymentMethod'=>$paymentMethod]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        $response = Gate::inspect('update',$paymentMethod);
        if ($response->allowed()) {
            return view('layouts.paymentMethod.edit', ['paymentMethod'=>$paymentMethod]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        $response = Gate::inspect('update',$paymentMethod);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'string|max:255|nullable',
                'description'=>'string|nullable',
                'img_path'=>'string|nullable'
            ]);
            if ($request->has('name') && $request['name']) {
                $paymentMethod->name = $request['name'];
            }
            if ($request->has('description') && $request['description']) {
                $paymentMethod->description = $request['description'];
            }
            if($request->has('img_path')){
                $img_path = $request->file('img_path');
                $extension = $img_path->getClientOriginalExtension();
                $name = $paymentMethod->id.'_'.time().'_'.$img_path->getClientOriginalName();
                $this->uploadPhoto( $img_path, $name, $extension);

                $paymentMethod->img_path=$name.'.'.$extension;
            }

            // Store in database
            $paymentMethod->save();

            // Do something after creating paymentMethod
            return $this->show($paymentMethod);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentMethod)
    {
        $response = Gate::inspect('delete',$paymentMethod);
        if ($response->allowed()){
            $paymentMethod->delete();
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
        $paymentMethod  = PaymentMethod::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$paymentMethod);
        if ($response->allowed()){
            $paymentMethod->forceDelete();
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
        $paymentMethod = PaymentMethod::withTrashed()->find($id);
        $response = Gate::inspect('restore',$paymentMethod);
        if ($response->allowed()){
            // Do some restore
            $paymentMethod->restore();
        }
        else{
            echo $response->message();
        }
    }
}
