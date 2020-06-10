<?php

namespace App\Http\Controllers;

use App\Star;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StarController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Star::class);
        if ($response->allowed()){
            return view('layouts.star.create');
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
        $response = Gate::inspect('create', Star::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'value'=>'bail|numeric|required',
                'starable_type'=>'bail|required|string|max:255',
                'starable_id'=>'bail|required|numeric',
            ]);
            // Store in database
            $star = Star::create(
                [
                    'inserted_by'=>Auth::id(),
                    'value'=>$request['value'],
                    'starable_type'=>$request['starable_type'],
                    'starable_id'=>$request['starable_id'],
                ]
            );
            // Do something after creating brand
            return $this->show($star);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function show(Star $star)
    {
        $response = Gate::inspect('view', $star);
        if ($response->allowed()) {
            return view('layouts.star.show', ['star'=>$star]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function edit(Star $star)
    {
        $response = Gate::inspect('update',$star);
        if ($response->allowed()) {
            return view('layouts.star.edit', ['star'=>$star]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Star $star)
    {
        $response = Gate::inspect('update',$star);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'value'=>'bail|numeric|required',
                'starable_type'=>'bail|required|string|max:255',
                'starable_id'=>'bail|required|numeric',
            ]);
            $star->value = $request['value'];
            $star->starable_type = $request['starable_type'];
            $star->starable_id = $request['starable_id'];

            // Store in database
            $star->save();

            // Do something after creating star
            return $this->show($star);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Star  $star
     * @return \Illuminate\Http\Response
     */
    public function destroy(Star $star)
    {
        $response = Gate::inspect('delete',$star);
        if ($response->allowed()){
            $star->delete();
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
        $star  = Star::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$star);
        if ($response->allowed()){
            $star->forceDelete();
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
        $star = Star::withTrashed()->find($id);
        $response = Gate::inspect('restore',$star);
        if ($response->allowed()){
            // Do some restore
            $star->restore();
        }
        else{
            echo $response->message();
        }
    }
}
