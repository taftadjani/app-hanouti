<?php

namespace App\Http\Controllers;

use App\Category;
use App\Traits\UploadsPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{
    use UploadsPhotos;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        return view('layouts.category.index', ['categories'=>$categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Category::class);
        if ($response->allowed()){
            return view('layouts.category.create');
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
        $response = Gate::inspect('create', Category::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'description'=>'string|nullable',
                'logo'=>'file|nullable'
            ]);
            $category = Category::create(
                [
                    'name'=>$request['name'],
                    'description'=>$request['description'],
                ]
            );

            if($request->has('logo')){
                $logo = $request->file('logo');
                $name = $category->id.'_'.time().'_'.$logo->getClientOriginalName();
                $this->uploadPhoto( $logo, $name);
                $category->logo=$name;
            }

            // Store in database
            $category->save();

            // Do something after creating category
            return $this->show($category);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $subCategories = $category->subCategories;
        $products=[];
        foreach ($subCategories as $subCategory) {
            if (count($subCategory->productStores)>0) {
                foreach ($subCategory->productStores as $productStore) {
                   $products[] = $productStore;
                }
            }
        }
        return view('layouts.category.show', ['category'=>$category, 'products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $response = Gate::inspect('update',$category);
        if ($response->allowed()) {
            return view('layouts.category.edit', ['category'=>$category]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $response = Gate::inspect('update',$category);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'string|max:255|nullable',
                'description'=>'string|nullable',
                'logo'=>'string|nullable'
            ]);
            if ($request->has('name') && $request['name']) {
                $category->name = $request['name'];
            }
            if ($request->has('description') && $request['description']) {
                $category->description = $request['description'];
            }

            if($request->has('logo')){
                $logo = $request->file('logo');
                $name = $category->id.'_'.time().'_'.$logo->getClientOriginalName();
                $this->uploadPhoto( $logo, $name);
                $category->logo=$name;
            }

            // Store in database
            $category->save();

            // Do something after creating category
            return $this->show($category);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $category = Category::withTrashed()->find($id);
        $response = Gate::inspect('delete',$category);
        if ($response->allowed()){
            $category->delete();
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
    public function forceDelete(Category $category)
    {
        $response = Gate::inspect('forceDelete',$category);
        if ($response->allowed()){
            $category->forceDelete();
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
        $category = Category::withTrashed()->find($id);
        $response = Gate::inspect('restore',$category);
        if ($response->allowed()){
            // Do some restore
            $category->restore();
        }
        else{
            echo $response->message();
        }
    }
}
