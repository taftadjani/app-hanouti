<?php

namespace App\Http\Controllers;

use App\Category;
use App\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::all();
        return $subCategories;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function products($idCategory, $idSubCategory)
    {
        $products = [];
        $categories = [];
        $subCategories = [];
        if ($idCategory == 1) {
            if ($idSubCategory == 1) {
                $name = "Furnishing and Decoration";
                $cats[] = 'Furnishing';
            }
            if ($idSubCategory == 2) {
                $name = "Home appliance and tableware";
                $cats[] = 'Kitchen';
                $cats[] = 'Home';
                $cats[] = 'Furnishing';
                $cats[] = 'Home appliance';
                $cats[] = 'crockery and cutlery';
            }
            if ($idSubCategory == 3) {
                $name = "Home laundry and Toiletry";
                $cats[] = 'Cleaning product';
                $cats[] = 'Toiletry';
            }
            if ($idSubCategory == 4) {
                $name = "Garden and Garage";
                $cats[] = 'Gardening & field';
                $cats[] = 'Garage';
            }
            if ($idSubCategory == 5) {
                $name = "Spice and Ingredient";
                $cats[] = 'Grocery';
            }
        }
        if ($idCategory == 2) {
            if ($idSubCategory == 1) {
                $name = "Nutrition and Vitamin";
                $cats[] = 'Food';
            }
            if ($idSubCategory == 2) {
                $name = "Sport and Well-being";
                $cats[] = 'Food';
                $cats[] = 'Sport';
                $cats[] = 'Kitchen';
                $cats[] = 'Urban sliding';
            }
            if ($idSubCategory == 3) {
                $name = "Optics and Lens";
            }
            if ($idSubCategory == 4) {
                $name = "MakeUp and Perfume";
                $cats[] = 'Makeup';
                $cats[] = 'Hair';
                $cats[] = 'Beauty';
            }
            if ($idSubCategory == 5) {
                $name = "Fashion and Brilliance";
                $cats[] = 'Beauty';
                $cats[] = 'Hair';
                $cats[] = 'Makeup';
            }
        }
        if ($idCategory == 3) {
            if ($idSubCategory == 1) {
                $name = "Phone and Tablet";
                $cats[] = 'Hardware';
                $cats[] = 'High-Tech & Gadget';
            }
            if ($idSubCategory == 2) {
                $name = "Camera and Camcorder";
                $cats[] = 'Software';
                $cats[] = 'Photgraphy';
                $cats[] = 'High-Tech & Gadget';
            }
            if ($idSubCategory == 3) {
                $name = "Computer and Device";
                $cats[] = 'Device';
                $cats[] = 'Computer science';
                $cats[] = 'Desktop';
                $cats[] = 'Hardware';
                $cats[] = 'High-Tech & Gadget';
            }
            if ($idSubCategory == 4) {
                $name = "Home cinema and TV";
                $cats[] = 'Hardware';
                $cats[] = 'Home';
                $cats[] = 'Desktop';
                $cats[] = 'High-Tech & Gadget';
            }
            if ($idSubCategory == 5) {
                $name = "Connected object";
                $cats[] = 'Hardware';
                $cats[] = 'Electronic';
                $cats[] = 'Device';
                $cats[] = 'Computer science';
                $cats[] = 'High-Tech & Gadget';
            }
        }
        if ($idCategory == 4) {
            if ($idSubCategory == 1) {
                $name = "Controller and Video Game";
                $cats[] = 'Hardware';
                $cats[] = 'Software';
                $cats[] = 'Device';
                $cats[] = 'Game & Toy';
                $cats[] = 'High-Tech & Gadget';
            }
            if ($idSubCategory == 2) {
                $name = "Consoles and PC gamer";
                $cats[] = 'Game & Toy';
                $cats[] = 'High-Tech & Gadget';
                $cats[] = 'Hardware';
            }
            if ($idSubCategory == 3) {
                $name = "Game & Toy";
                $cats[] = 'Game & Toy';
            }
        }
        if ($idCategory == 5) {
            if ($idSubCategory == 1) {
                $name = "Jewerly & Bags";
                $cats[] = 'Bag';
                $cats[] = 'Jewelry';
            }
            if ($idSubCategory == 2) {
                $name = "Fashion men";
                $cats[] = 'Beauty';
                $cats[] = 'Hair';
                $cats[] = 'Bag';
            }
            if ($idSubCategory == 3) {
                $name = "Fashion women";
                $cats[] = 'Beauty';
                $cats[] = 'Hair';
                $cats[] = 'Bag';
            }
            if ($idSubCategory == 4) {
                $name = "Fashion baby";
                $cats[] = 'Beauty';
                $cats[] = 'Hair';
                $cats[] = 'Bag';
            }
            if ($idSubCategory == 5) {
                $name = "Hat & Cap";
                $cats[] = 'Beauty';
                $cats[] = 'Hair';
                $cats[] = 'Bag';
            }
        }
        foreach ($cats as $cat) {
            $categories[]= Category::where('name', $cat)->first();
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
        return view('layouts.category.show', ['name'=>$name, 'products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', SubCategory::class);
        if ($response->allowed()){
            return view('layouts.subCategory.create',['categories'=>Category::all()]);
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
        $response = Gate::inspect('create', SubCategory::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'category_id'=>'bail|required|numeric'
            ]);

            $category = Category::where('id', $request['category_id'])->first();
            if ($category == null) {
                // Do something
            }

            $subCategory = new SubCategory([
                'name'=>$request['name']
            ]);

            // Store in database
            $category->subCategories()->save($subCategory);

            // Do something after creating subCategory
            return $this->show($subCategory);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory)
    {
        $response = Gate::inspect('view', $subCategory);
        if ($response->allowed()) {
            return view('layouts.subCategory.show', ['subCategory'=>$subCategory]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        $response = Gate::inspect('update',$subCategory);
        if ($response->allowed()) {
            return view('layouts.subCategory.edit', ['subCategory'=>$subCategory, 'categories'=>Category::all()]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        $response = Gate::inspect('update',$subCategory);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'nullable|string|max:255',
                'category_id'=>'nullable|numeric'
            ]);

            if ($request->has('name') && $request['name']) {
                $subCategory->name=$request['name'];
            }
            if ($request->has('category_id') && $request['category_id']) {
                $category = Category::where('id', $request['category_id'])->first();
                if ($category == null) {
                }
                $subCategory->category()->associate($category);
            }

            $subCategory->save();
            // Do something after creating category
            return $this->show($subCategory);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $response = Gate::inspect('delete',$subCategory);
        if ($response->allowed()){
            $subCategory->delete();
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
    public function forceDelete(SubCategory $subCategory)
    {
        $response = Gate::inspect('forceDelete',$subCategory);
        if ($response->allowed()){
            $subCategory->forceDelete();
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
        $subCategory = SubCategory::withTrashed()->find($id);
        $response = Gate::inspect('restore',$subCategory);
        if ($response->allowed()){
            // Do some restore
            $subCategory->restore();
        }
        else{
            echo $response->message();
        }
    }
}
