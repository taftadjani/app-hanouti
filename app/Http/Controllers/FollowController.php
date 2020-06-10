<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class FollowController extends Controller
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
        $follows = Auth::user()->follows;
        return $follows;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Follow::class);
        if ($response->allowed()){
            return view('layouts.follow.create');
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
        $response = Gate::inspect('create', Follow::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'followable_id'=>'bail|required|numeric',
                'followable_type'=>'bail|required|string|max:255',
            ]);

            $follow = Follow::create(
                [
                    'followed_by'=>Auth::id(),
                ]
            );

            if($request['followable_type'] == 'company'){
                $follow->followable_type = 'company';
                $follow->followable_id = $request['followable_id'];
            }

            if($request['followable_type'] == 'store'){
                $follow->followable_type = 'store';
                $follow->followable_id = $request['followable_id'];
            }

            if($request['followable_type'] == 'user'){
                // Verify if user is unless an admin otherwise not possible
                $follow->followable_type = 'user';
                $follow->followable_id = $request['followable_id'];
            }

            // Store in database
            $follow->save();

            // Do something after creating follow
            return $this->show($follow);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function show(Follow $follow)
    {
        $response = Gate::inspect('view', $follow);
        if ($response->allowed()) {
            return view('layouts.follow.show', ['follow'=>$follow]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function edit(Follow $follow)
    {
        $response = Gate::inspect('update',$follow);
        if ($response->allowed()) {
            return view('layouts.follow.edit', ['follow'=>$follow]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Follow $follow)
    {
        $response = Gate::inspect('update',$follow);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'followable_id'=>'bail|required|numeric',
                'followable_type'=>'bail|required|string|max:255',
            ]);

            if($request->has('followable_type') && $request['followable_type'] == 'company'){
                $follow->followable_type = 'company';
                $follow->followable_id = $request['followable_id'];
            }

            if($request->has('followable_type') && $request['followable_type'] == 'store'){
                $follow->followable_type = 'store';
                $follow->followable_id = $request['followable_id'];
            }

            if($request->has('followable_type') && $request['followable_type'] == 'user'){
                // Verify if user is unless an admin otherwise not possible
                $follow->followable_type = 'user';
                $follow->followable_id = $request['followable_id'];
            }

            // Store in database
            $follow->save();

            // Do something after creating follow
            return $this->show($follow);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Follow  $follow
     * @return \Illuminate\Http\Response
     */
    public function destroy(Follow $follow)
    {
        $response = Gate::inspect('delete',$follow);
        if ($response->allowed()){
            $follow->delete();
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
        $follow  = Follow::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$follow);
        if ($response->allowed()){
            $follow->forceDelete();
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
        $follow = Follow::withTrashed()->find($id);
        $response = Gate::inspect('restore',$follow);
        if ($response->allowed()){
            // Do some restore
            $follow->restore();
        }
        else{
            echo $response->message();
        }
    }
}
