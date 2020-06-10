<?php

namespace App\Http\Controllers;

use App\Seen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SeenController extends Controller
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
        $response = Gate::inspect('create', Seen::class);
        if ($response->allowed()){
            return view('layouts.seen.create');
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
        $response = Gate::inspect('create', Seen::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'seenable_type'=>'bail|required|string|max:255',
                'seenable_id'=>'bail|required|numeric',
            ]);
            // Store in database
            $seen = Seen::create(
                [
                    'seenable_type'=>$request['seenable_type'],
                    'seenable_id'=>$request['seenable_id'],
                    'user_id'=>Auth::id(),
                ]
            );
            // Do something after creating brand
            return $this->show($seen);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seen  $seen
     * @return \Illuminate\Http\Response
     */
    public function show(Seen $seen)
    {
        $response = Gate::inspect('view', $seen);
        if ($response->allowed()) {
            return view('layouts.seen.show', ['seen'=>$seen]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seen  $seen
     * @return \Illuminate\Http\Response
     */
    public function edit(Seen $seen)
    {
        $response = Gate::inspect('update',$seen);
        if ($response->allowed()) {
            return view('layouts.seen.edit', ['seen'=>$seen]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seen  $seen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Seen $seen)
    {
        $response = Gate::inspect('update',$seen);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'seenable_type'=>'bail|required|string|max:255',
                'seenable_id'=>'bail|required|numeric',
            ]);
            $seen->seenable_type = $request['seenable_type'];
            $seen->seenable_id = $request['seenable_id'];

            // Store in database
            $seen->save();

            // Do something after creating seen
            return $this->show($seen);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seen  $seen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seen $seen)
    {
        $response = Gate::inspect('delete',$seen);
        if ($response->allowed()){
            $seen->delete();
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
        $seen  = Seen::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$seen);
        if ($response->allowed()){
            $seen->forceDelete();
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
        $seen = Seen::withTrashed()->find($id);
        $response = Gate::inspect('restore',$seen);
        if ($response->allowed()){
            // Do some restore
            $seen->restore();
        }
        else{
            echo $response->message();
        }
    }
}
