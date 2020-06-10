<?php

namespace App\Http\Controllers;

use App\Brand;
use App\Traits\UploadsPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BrandController extends Controller
{
    use UploadsPhotos;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::all();
        return $brands;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Brand::class);
        if ($response->allowed()){
            return view('layouts.brand.create');
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
        $response = Gate::inspect('create', Brand::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'description'=>'string|nullable',
                'logo'=>'file|nullable'
            ]);

            $brand = Brand::create(
                [
                    'name'=>$request['name'],
                    'description'=>$request['description'],
                    'inserted_by'=>Auth::id(),
                ]
            );

            if($request->has('logo')){
                $logo = $request->file('logo');
                $name = $brand->id.'_'.time().'_'.$logo->getClientOriginalName();
                $this->uploadPhoto( $logo, $name);
                $brand['logo']=$name;
            }

            // Store in database
            $brand->save();

            // Do something after creating brand
            return $this->show($brand);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function show(Brand $brand)
    {
        $response = Gate::inspect('view', $brand);
        if ($response->allowed()) {
            return view('layouts.brand.show', ['brand'=>$brand]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        $response = Gate::inspect('update',$brand);
        if ($response->allowed()) {
            return view('layouts.brand.edit', ['brand'=>$brand]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $response = Gate::inspect('update',$brand);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'string|max:255|nullable',
                'description'=>'string|nullable',
                'logo'=>'file|nullable'
            ]);
            if ($request->has('name') && $request['name']) {
                $brand->name = $request['name'];
            }
            if ($request['description']) {
                $brand->description = $request['description'];
            }
            if($request->has('logo')){
                $logo = $request->file('logo');
                $name = $brand->id.'_'.time().'_'.$logo->getClientOriginalName();
                $this->uploadPhoto( $logo, $name);
                $brand->logo=$name;
            }

            // Store in database
            $brand->save();

            // Do something after creating brand
            return $this->show($brand);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Brand  $brand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        $response = Gate::inspect('delete',$brand);
        if ($response->allowed()){
            $brand->delete();
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
        $brand  = Brand::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$brand);
        if ($response->allowed()){
            $brand->forceDelete();
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
        $brand = Brand::withTrashed()->find($id);
        $response = Gate::inspect('restore',$brand);
        if ($response->allowed()){
            // Do some restore
            $brand->restore();
        }
        else{
            echo $response->message();
        }
    }
}
