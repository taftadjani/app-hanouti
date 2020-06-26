<?php

namespace App\Http\Controllers;

use App\Category;
use App\Condition;
use App\Currency;
use App\Price;
use App\Product;
use App\ProductStore;
use App\Role;
use App\Store;
use App\SubCategory;
use App\Traits\UploadsPhotos;
use App\Unit;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductStoreController extends Controller
{
    use UploadsPhotos;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Return list of ProductStore
        $productStore = ProductStore::all();

        return view('layouts.productStore.index',['products'=>$productStore, 'title'=>'All products']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function adminIndex()
    {
        // The action is authorized...

        // Return list of ProductStore
        $productStore = ProductStore::all()->take(300);
        return view('layouts.productStore.adminIndex',['products'=>$productStore]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function popularProducts()
    {
        // The action is authorized...

        // Return list of ProductStore
        $productStore = ProductStore::all();

        // Logic de popular productshere
        $products= [];
        foreach ($productStore as $product) {
            $products[]=$product;
            if (count($products)>=50) {
            break;
            }
        }


        return view('layouts.productStore.index',['products'=>$products, 'title'=>'Popular products']);

        // $user = Auth::user();
        // return $user->stores->where('id',1)->first() ;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', ProductStore::class);
        if ($response->allowed()) {
            // The action is authorized...

            // If he doesn't have a minimum role of seller

            // Verify if the user have unless one store
            if (Auth::user()->stores->count() === 0) {
                // Dont have any store Do something
                return redirect()->route('stores.create');
            }

            // Show the form here
            return view('layouts.productStore.create',
                        [
                            'stores'=> Auth::user()->stores,
                            'products'=>Product::all(),
                            'conditions'=> Condition::all(),
                            'units'=>Unit::all(),
                            'currencies'=>Currency::all(),
                            'categories'=>Category::all(),
                            'subCategories'=>SubCategory::all(),
                        ]);
        } else {
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
        $response = Gate::inspect('create', ProductStore::class);
        if ($response->allowed()) {
            // The action is authorized...
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'reference'=>'bail|required|string|max:255',
                'description'=>'nullable|string',
                'keywords'=>'nullable|string',
                'store_id'=>'bail|required|numeric',
                'condition_id'=>'bail|required|numeric',
                'stock_unit_id'=>'bail|required|numeric',
                'quantity_stock'=>'bail|required|numeric',
                'category_ids'=>'array|nullable',
                'sub_category_ids'=>'array|nullable'
                ]);


            // Validation for price
            $request->validate([
                'price_value'=>'bail|required|numeric|',
                'currency_id'=>'bail|required|numeric',
                'price_quantity'=>'bail|required|numeric',
                'price_quantity_unit_id'=>'bail|required|numeric',
            ]);

            // Verify if the user have unless one store
            if (Auth::user()->stores->count() === 0) {
                // Dont have any store, redirect to store and display a message
                return redirect()->route('stores.create');
            }

            // Get related data
            $products = Product::where('reference', $request['reference'])->get();
            if ( count($products) > 0) {
                $product = $products->first();
            }else{
                // Pas de product with this reference
                if ($request['is_liquid']) {
                    $product = Product::where('reference',config('app.product.no_ref.liquid'))->first();
                }else{
                    $product = Product::where('reference',config('app.product.no_ref.solid'))->first();
                }
            }

            if ($request->has('store_id')) {
                $stores = Auth::user()->stores->where('id', $request['store_id']);
                if ($stores->count() == 0) {
                    // Dont possess this store, do something with message
                    return redirect()->back();
                }
                $store = $stores->first();
            }

            if ($request->has('condition_id')) {
                $conditions = Condition::where('id', $request['condition_id'])->get();
                if (count($conditions) == 0) {
                    // Dont have a condition, do something with message
                    return redirect()->back();
                }
                $condition = $conditions->first();
            }

            // Unity of quantity
            if ($request->has('stock_unit_id')) {
                $units = Unit::where('id', $request['stock_unit_id'])->get();
                if ( count($units) ==0 ) {
                    // Dont have a condition, do something
                    return redirect()->back();
                }
                $unit = $units->first();
            }

            // Create the product store
            $productStore = ProductStore::create([
                'inserted_by'=>Auth::user()->id,
                'store_id'=>$store->id,
                'product_id'=>$product->id,
                'condition_id'=>$condition->id,
                'unit_id'=>$unit->id,
                'name'=>$request['name'],
            ]);

            $productStore_id = $productStore->id;

            if ($request->has('images')) {
                $database_names=[];
                $images = $request->file('images');
                for ($i=0; $i < count($images); $i++) {
                    $name = $productStore_id.'_'.time().'_'.$images[$i]->getClientOriginalName();
                    $this->uploadPhoto( $images[$i] ,$name);
                    $database_names[$i]=$name;
                }
                $productStore->images=json_encode($database_names);
            }

            // Insert other no required value
            if ($request['quantity_stock']) {
                $productStore->quantity_stock = $request['quantity_stock'];
            }
            if ($request->has('description') && $request['description'] != null) {
                $productStore->description = $request['description'];
            }
            if ($request->has('keywords') && $request['keywords'] != null) {
                $productStore->keywords = $request['keywords'];
            }
            if ($request['negociable']) {
                $productStore->negociable = true;
            }
            if ($request['visible_on_store']) {
                $productStore->visible_on_store = true;
            }
            if ($request['have_return']) {
                $productStore->have_return = true;
            }

            $productStore->save();

            // Create the price standard and link them
            if ($productStore == null) {
                # code...
                return;
            }
            // Unity of quantity
            if ($request->has('price_quantity_unit_id')) {
                $price_units = Unit::where('id', $request['price_quantity_unit_id'])->get();
                if ( count($price_units) ==0 ) {
                    // Dont have a condition, do something
                    return redirect()->back();
                }
                $price_unit = $price_units->first();
            }
            $price = new Price(
                [
                    'value'=>$request['price_value'],
                    'quantity'=>$request['price_quantity'],
                    'currency_id'=>$store->currency->id,
                    'unit_id'=>$price_unit->id,
                    'inserted_by'=>Auth::id(),
                    'enabled_at'=>now(),
                ]
            );
            $productStore->prices()->save($price);

            // Sub_categories
            $product_store_sub_categories = [];
            $sub_category_ids = $request['sub_category_ids'];
            foreach ($sub_category_ids as $sub_category_id) {
                $product_store_sub_categories[]=[
                    'product_store_id'=> $productStore->id,
                    'sub_category_id'=>$sub_category_id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ];
            }
            DB::table('product_store_sub_category')->insert(
                $product_store_sub_categories
            );

            // Details
            $product_store_details = [];
            if ($request->has('details_number')) {
                for ($i=1; $i <= $request['details_number']; $i++) {
                    $product_store_details[]=[
                        'product_store_id'=>$productStore->id,
                        'name'=>$request['detail_name_'.$i],
                        'content_value'=>$request['detail_value_'.$i],
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ];
                }
            }

            // return $product_store_details;
            DB::table('product_store_details')->insert(
                $product_store_details
            );

            // Return to show method with a success message
            return redirect()->route('home');
        } else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductStore  $productStore
     * @return \Illuminate\Http\Response
     */
    public function show(ProductStore $productStore)
    {
        $star_value = 0;
        foreach ($productStore->stars as $star) {
            if ($star->inserted_by ==Auth::id()) {
                $star_value = $star->value;
            break;
            }
        }
        $percentage = 0;
        $value = 0;
        $max_value = 0;
        foreach ($productStore->stars as $star) {
            $value +=$star->value;
            $max_value+=5;
        }
        if (!($max_value ==0)) {
            $percentage = $value/$max_value;
        }
        return view('layouts.productStore.show',
                                    [
                                        'product'=>$productStore,
                                        "auth"=>Auth::user(),
                                        'star_value'=>$star_value,
                                        'percentage_star'=>$percentage*100
                                    ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductStore  $productStore
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductStore $productStore)
    {
        $response = Gate::inspect('update', $productStore);
        if ($response->allowed()) {
            // The action is authorized...
            return view('layouts.productStore.edit',
                ['productStore'=>$productStore,
                    'stores'=> Auth::user()->stores,
                    'products'=>Product::all(),
                    'conditions'=> Condition::all(),
                    'units'=>Unit::all(),
                    'currencies'=>Currency::all(),
                    'categories'=>Category::all(),
                    'subCategories'=>SubCategory::all(),
                ]);
        }else {
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductStore  $productStore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductStore $productStore)
    {
        $response = Gate::inspect('update', $productStore);
        if ($response->allowed()) {
            // The action is authorized...
            $request->validate([
                'reference'=>'nullable|string|max:255',
                'store_id'=>'nullable|numeric',
                'condition_id'=>'nullable|numeric',
                'stock_unit_id'=>'nullable|numeric',
                'images'=>'nullable|string',
                'name'=>'nullable|string|max:255',
                'description'=>'nullable|string',
                'keywords'=>'nullable|string',
                'quantity_stock'=>'nullable|numeric',
                'negociable'=>'nullable|boolean',
                'visible_on_store'=>'nullable|boolean',
                'have_return'=>'nullable|boolean',
                'category_ids'=>'json|nullable',
                'sub_category_ids'=>'json|nullable'
            ]);

            // Verify if the user have unless one store
            if (count(Auth::user()->stores) == 0) {
                // Dont have any store Do something
                return ;
            }

            // Get related data
            if ($request->has('reference') && $request['reference']) {
                $product = Product::where('reference', $request['reference'])->first();
                if ($product != null) {
                    $productStore->products()->save($product);
                }
            }
            if ($request->has('store_id') && $request['store_id']) {
                $store =Auth::user()->stores->where('id',$request['store_id'])->first();
                if ($store != null) {
                    // Dont have a store, do something
                    $productStore->stores()->save($store);
                }
            }

            if ($request->has('condition_id') && $request['condition_id']) {
                $condition = Condition::where('id', $request['condition_id'])->first();
                if ($condition != null) {
                    // Dont have a condition, do something
                    $productStore->conditions()->save($condition);
                }
            }

            if ($request->has('stock_unit_id') && $request['stock_unit_id']) {
                $unit = Unit::where('id', $request['stock_unit_id'])->first();
                if ($unit != null) {
                    // Dont have a condition, do something
                    $productStore->unit()->attach($unit);
                }
            }

            $productStore_id = $productStore->id;
            if ($request->has('images') && $request['images']) {
                $database_names=[];
                $images = $request->file('images');
                for ($i=0; $i < count($images); $i++) {
                    $name = $productStore_id.'_'.time().'_'.$images[$i]->getClientOriginalName();
                    $this->uploadPhoto( $images[$i] ,$name);
                    $database_names[$i]=$name;
                }
                $productStore->images=json_encode($database_names);
            }

            if ($request->has('name') && $request['name']) {
                $productStore->name=$request['name'];
            }
            if ($request->has('quantity_stock') && $request['quantity_stock']) {
                $productStore->quantity_stock = $request['quantity_stock'];
            }
            if ($request->has('description') && $request['description']) {
                $productStore->description = $request['description'];
            }
            if ($request->has('keywords') && $request['keywords']) {
                $productStore->keywords = $request['keywords'];
            }
            if ($request->has('negociable') && $request['negociable']) {
                $productStore->negociable = true;
            }
            if ($request->has('visible_on_store') && $request['visible_on_store']) {
                $productStore->visible_on_store = true;
            }
            if ($request->has('have_return') && $request['visible_on_store']) {
                $productStore->have_return = true;
            }

            // Sub_categories
            $product_store_sub_categories = [];
            $sub_category_ids = $request['sub_category_ids'];
            foreach ($sub_category_ids as $sub_category_id) {
                $product_store_sub_categories[]=[
                    'product_store_id'=> $productStore->id,
                    'sub_category_id'=>$sub_category_id,
                    'created_at'=>now(),
                    'updated_at'=>now(),
                ];
            }
            DB::table('product_store_sub_category')->insert(
                $product_store_sub_categories
            );

            // Details
            $product_store_details = [];
            if ($request->has('details_number')) {
                for ($i=0; $i < $request['details_number']; $i++) {
                    $product_store_details[]=[
                        'product_store_id'=>$productStore->id,
                        'name'=>$request['detail_name_'.$i],
                        'content_value'=>$request['detail_value_'.$i],
                        'created_at'=>now(),
                        'updated_at'=>now(),
                    ];
                }
            }

            DB::table('product_store_details')->insert(
                $product_store_details
            );

            $productStore->save();

            // Return to show method with a success message
            return $this->show($productStore);

        }else {
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductStore  $productStore
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductStore $productStore)
    {
        $response = Gate::inspect('delete', $productStore);
        if ($response->allowed()){
            $productStore->delete();
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
    public function forceDelete(ProductStore $productStore)
    {
        $response = Gate::inspect('forceDelete',$productStore);
        if ($response->allowed()){
            $productStore->forceDelete();
            // Return to dashboard with a message
            return;
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
        $productStore = ProductStore::withTrashed()->find($id);
        $response = Gate::inspect('restore', $productStore);
        if ($response->allowed()){
            // Do some restore
            $productStore->restore();
        }
        else{
            echo $response->message();
        }
    }
}
