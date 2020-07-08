<?php

namespace App\Http\Controllers;

use App\Category;
use App\ProductStore;
use App\SubCategory;
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
        return view('layouts.category.show', ['name'=>$category->name, 'products'=>$products]);
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
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function products($id)
    {
        $products = [];
        $categories = [];
        // 1
        if ($id == 1) {
            $name = "Home and kitchen";
            // Stationery
            $categories[] = Category::where('name', 'Stationery')->first();
            // Clothing
            $categories[] = Category::where('name', 'Clothing')->first();
            // crockery and cutlery
            $categories[] = Category::where('name', 'crockery and cutlery')->first();
            // Kitchen
            $categories[] = Category::where('name', 'Kitchen')->first();
            // Home appliance
            $categories[] = Category::where('name', 'Home appliance')->first();
            // Home
            $categories[] = Category::where('name', 'Home')->first();
            // Cleaning product
            $categories[] = Category::where('name', 'Cleaning product')->first();
            // Toiletry
            $categories[] = Category::where('name', 'Toiletry')->first();
            // Furnishing
            $categories[] = Category::where('name', 'Furnishing')->first();
            // Gardening & field
            $categories[] = Category::where('name', 'Gardening & field')->first();
            // Grocery
            $categories[] = Category::where('name', 'Grocery')->first();
            // Food
            $categories[] = Category::where('name', 'Food')->first();
        }

        // 2
        if ($id == 2) {
            $name = "Beauty and health";
            // Beauty
            $categories[] = Category::where('name', 'Beauty')->first();
            // Hair
            $categories[] = Category::where('name', 'Hair')->first();
            // Makeup
            $categories[] = Category::where('name', 'Makeup')->first();
            // Food
            $categories[] = Category::where('name', 'Food')->first();
        }

        // 3
        if ($id == 3) {
            $name = "High-tech and gadget";
            // Software
            $categories[] = Category::where('name', 'Software')->first();
            // Hardware
            $categories[] = Category::where('name', 'Hardware')->first();
            // Computer science
            $categories[] = Category::where('name', 'Computer science')->first();
            // High-Tech & Gadget
            $categories[] = Category::where('name', 'High-Tech & Gadget')->first();
            // Musical instrument
            $categories[] = Category::where('name', 'Musical instrument')->first();
            // Electronic
            $categories[] = Category::where('name', 'Electronic')->first();
            // Desktop
            $categories[] = Category::where('name', 'Desktop')->first();
            // Computer component
            $categories[] = Category::where('name', 'Computer component')->first();
            // Photgraphy
            $categories[] = Category::where('name', 'Photgraphy')->first();
            // Device
            $categories[] = Category::where('name', 'Device')->first();
        }

        // 4
        if ($id == 4) {
            $name = "Game and console";
            // Software
            $categories[] = Category::where('name', 'Software')->first();
            // Hardware
            $categories[] = Category::where('name', 'Hardware')->first();
            // Computer science
            $categories[] = Category::where('name', 'Computer science')->first();
            // High-Tech & Gadget
            $categories[] = Category::where('name', 'High-Tech & Gadget')->first();
            // Game & Toy
            $categories[] = Category::where('name', 'Game & Toy')->first();
            // Desktop
            $categories[] = Category::where('name', 'Desktop')->first();
        }

        // 5
        if ($id == 5) {
            $name = "Clothing, Footwear and jewerly";
            // Clothing
            $categories[] = Category::where('name', 'Clothing')->first();
            // Beauty
            $categories[] = Category::where('name', 'Beauty')->first();
            // Hair
            $categories[] = Category::where('name', 'Hair')->first();
            // Makeup
            $categories[] = Category::where('name', 'Makeup')->first();
            // Bag
            $categories[] = Category::where('name', 'Bag')->first();
            // Jewelry
            $categories[] = Category::where('name', 'Jewelry')->first();
            // Sport
            $categories[] = Category::where('name', 'Sport')->first();
        }

        foreach ($categories as $category) {
            foreach ($category->subCategories as $subCategories) {
                foreach ($subCategories->productStores as $productStore) {
                    $products[]=$productStore;
                }
            }
        }
        re_start :
        foreach ($products as $key => $value) {
            foreach ($products as $key2 => $value2) {
                if ($value->id == $value2->id && $key != $key2) {
                    unset($products[$key2]);
                    goto re_start;
                }
            }
        }
        // unset($product[0]);
        // return $products;
        return view('layouts.category.show', ['name'=>$name, 'products'=>$products]);
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
