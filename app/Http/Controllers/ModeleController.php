<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Modele;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ModeleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modeles=Modele::all();
        return $modeles;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Modele::class);
        if ($response->allowed()){
            return view('layouts.modele.create',
                ['brands'=>Brand::all()]);
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
        $response = Gate::inspect('create', Modele::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'brand_id'=>'bail|required|numeric',
            ]);

            // Verify if the brand id exists
            $brand = Brand::where('id',$request['brand_id'])->first();
            if ($brand  == null) {
                // Do something when brand is null
            }

            // Store in database
            $modele=Modele::create(
                [
                'inserted_by '=>Auth::id(),
                'name'=>$request['name'],
                'brand_id'=>$brand->id,
            ]);

            // Do something after creating brand
            return $this->show($modele);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function show(Modele $modele)
    {
        $response = Gate::inspect('view', $modele);
        if ($response->allowed()) {
            return view('layouts.modele.show',
            ['modele'=>$modele, 'brands'=>Brand::all()]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function edit(Modele $modele)
    {
        $response = Gate::inspect('update',$modele);
        if ($response->allowed()) {
            return view('layouts.modele.edit', ['modele'=>$modele, 'brands'=>Brand::all()]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modele $modele)
    {
        $response = Gate::inspect('update',$modele);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'string||max:255|nullable',
                'brand_id'=>'numeric|nullable',
            ]);

            // Verify if the brand id exists
            if ($request->has('brand_id') && $request['brand_id']) {
                $brand = Brand::where('id',$request['brand_id'])->first();
                if ($brand  == null) {
                    // Do something when brand is null
                }
                $modele->brand_id=$brand->id;
            }

            if ($request->has('name') && $request['name']) {
                $modele->name=$request['name'];
            }

            // Store in database
            $modele->save();

            // Do something after creating brand
            return $this->show($modele);
        }else {
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Modele  $modele
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modele $modele)
    {
        $response = Gate::inspect('delete',$modele);
        if ($response->allowed()){
            $modele->delete();
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
    public function forceDelete(Modele $modele)
    {
        $response = Gate::inspect('forceDelete',$modele);
        if ($response->allowed()){
            $modele->forceDelete();
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
        $modele = Modele::withTrashed()->find($id);
        $response = Gate::inspect('restore',$modele);
        if ($response->allowed()){
            // Do some restore
            $modele->restore();
        }
        else{
            echo $response->message();
        }
    }
}
