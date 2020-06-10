<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $units = Unit::all()->take(10);
        return $units;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Unit::class);
        if ($response->allowed()){
            return view('layouts.unit.create');
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
        $response = Gate::inspect('create', Unit::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'abbrev'=>'bail|required|string|max:255',
                'for_liquid'=>'nullable|boolean',
            ]);
            $unit = Unit::create(
                [
                    'name'=>$request['name'],
                    'abbrev'=>$request['abbrev'],
                ]
            );
            if($request->has('for_liquid') && $request['for_liquid']){
                $unit->for_liquid=true;
            }

            // Store in database
            $unit->save();

            // Do something after creating unit
            return $this->show($unit);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        return view('layouts.unit.show', ['unit'=>$unit]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        $response = Gate::inspect('update',$unit);
        if ($response->allowed()) {
            return view('layouts.unit.edit', ['unit'=>$unit]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $response = Gate::inspect('update',$unit);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'nullable|string||max:255',
                'abbrev'=>'nullable|string',
                'for_liquid'=>'nullable|boolean',
            ]);
            if ($request->has('name') && $request['name']) {
                $unit->name = $request['name'];
            }
            if ($request->has('abbrev') && $request['abbrev']) {
                $unit->abbrev = $request['abbrev'];
            }
            if ($request->has('for_liquid') && $request['for_liquid']) {
                $unit->for_liquid = true;
            }

            if($request->has('for_liquid') && $request['for_liquid']){
                $unit->for_liquid=true;
            }

            // Store in database
            $unit->save();

            // Do something after creating unit
            return $this->show($unit);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Unit  $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        $response = Gate::inspect('delete',$unit);
        if ($response->allowed()){
            $unit->delete();
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
    public function forceDelete(Unit $unit)
    {
        $response = Gate::inspect('forceDelete',$unit);
        if ($response->allowed()){
            $unit->forceDelete();
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
    public function restore( $id)
    {
        $unit = Unit::withTrashed()->find($id);
        $response = Gate::inspect('restore',$unit);
        if ($response->allowed()){
            // Do some restore
            $unit->restore();
        }
        else{
            echo $response->message();
        }
    }
}
