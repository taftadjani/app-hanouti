<?php

namespace App\Http\Controllers;

use App\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditions = Condition::all()->take(10);
        return $conditions;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Condition::class);
        if ($response->allowed()){
            return view('layouts.condition.create');
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
        $response = Gate::inspect('create', Condition::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|unique:conditions|max:255',
                'description'=>'string|nullable'
            ]);

            // Store in database
            $condition = Condition::create(
                [
                    'name'=>$request['name'],
                    'description'=>$request['description'],
                ]
            );

            // Do something after creating condition
            return $this->show($condition);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function show(Condition $condition)
    {
        $response = Gate::inspect('view', $condition);
        if ($response->allowed()) {
            return view('layouts.condition.show', ['condition'=>$condition]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function edit(Condition $condition)
    {
        $response = Gate::inspect('update',$condition);
        if ($response->allowed()) {
            return view('layouts.condition.edit', ['condition'=>$condition]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condition $condition)
    {
        $response = Gate::inspect('update',$condition);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'string|max:255|nullable',
                'description'=>'string|nullable'
            ]);

            if ($request->has('name') && $request['name']) {
                $condition->name = $request['name'];
            }

            if ($request->has('description') && $request['description']) {
                $condition->description = $request['description'];
            }

            // Store in database
            $condition->save();

            // Do something after creating condition
            return $this->show($condition);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condition $condition)
    {
        $response = Gate::inspect('delete',$condition);
        if ($response->allowed()){
            $condition->delete();
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
    public function forceDelete(Condition $condition)
    {
        $response = Gate::inspect('forceDelete',$condition);
        if ($response->allowed()){
            $condition->forceDelete();
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
        $condition = Condition::withTrashed()->find($id);
        $response = Gate::inspect('restore',$condition);
        if ($response->allowed()){
            // Do some restore
            $condition->restore();
        }
        else{
            echo $response->message();
        }
    }
}
