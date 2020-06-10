<?php

namespace App\Http\Controllers;

use App\Product;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Traits\UploadsPhotos;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Gate;
class ProductController extends Controller
{
    use UploadsPhotos;
    use SoftDeletes;
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
        $response = Gate::inspect('viewAny', Product::class);
        if ($response->allowed()){
            return Product::all();
            // return view('layouts.product.index');
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $response = Gate::inspect('create', Product::class);
        if ($response->allowed()) {

            // Show the form here
            return view('layouts.product.create');
        } else {
            // The action is authorized...
            $seller_role = Role::where('reference', config('role.seller'))->first();
            $user = Auth::user();
            if ( count($user->roles)<1) {
                // The user doesn't have any role
                $user->roles()->attach($seller_role);
            }
            if (!($user->isSeller() || $user->isAdmin()) ) {
                // authenticated and not seller and not admin : upgrade him as a seller
                $user->roles()->attach($seller_role);
            }
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
        $response = Gate::inspect('create', Product::class);
        if ($response->allowed()) {
            $seller_role = Role::where('reference', config('role.seller'))->first();

            $user = Auth::user();
            if ( count($user->roles)<1) {
                // The user doesn't have any role
                $user->roles()->attach($seller_role);
            }

            if (!($user->isSeller() || $user->isAdmin()) ) {
               // authenticated and not seller and not admin : upgrade him as a seller
               $user->roles()->attach($seller_role);
            }

            $user_id = $user->id;
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'reference'=>'bail|required|string|unique:products|max:255',
                'sku'=>'bail|string|max:255',
                'is_liquid'=>'boolean|nullable',
                'description'=>'string|nullable',
                'keywords'=>'string|nullable',
                'images'=>'string|nullable',
            ]);

            $product = Product::create([
                'name'=>$request['name'],
                'reference'=>$request['reference'],
                'sku'=>$request['sku'],
                'description'=>$request['description'],
                'keywords'=>$request['keywords'],
                'inserted_by'=>$user_id
            ]);
            $product_id = $product->id;

            if ($request['is_liquid']) {
                $product->is_liquid = true;
            }
            if ($request->has('images')) {
                $database_names=[];
                $images = $request->file('images');
                for ($i=0; $i < count($images); $i++) {
                    $extension = $images[$i]->getClientOriginalExtension();
                    $name = $product_id.'_'.time().'_'.$images[$i]->getClientOriginalName();
                    $this->uploadPhoto( $images[$i] ,$name,$extension);
                    $database_names[$i]=$name.'.'.$extension;
                }
                $product->images=json_encode($database_names);
            }
            $product->save();

            // Return to create method with a success message
            return;

        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product,Request $request)
    {
        $response = Gate::inspect('view', $product);
        if ($response->allowed()) {
            return view('layouts.product.show',['product'=>$product]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product,Request $request)
    {
        $response = Gate::inspect('update',$product);
        if ($response->allowed()) {
            return view('layouts.product.edit',
            ['product'=>$product]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $response = Gate::inspect('update',$product);
        if ($response->allowed()){
            // Update the product

            $request->validate([
                'name'=>'string|max:255|nullable',
                'reference'=>'string|max:255|nullable',
                'sku'=>'string|max:255|nullable',
                'is_liquid'=>'boolean|nullable',
                'description'=>'string|nullable',
                'keywords'=>'string|nullable',
                'images'=>'string|nullable',
            ]);

            if ($request->has('name') && $request['name']) {
                $product->name=$request['name'];
            }
            if ($request->has('reference') && $request['reference']) {
                $product->reference=$request['reference'];
            }
            if ($request->has('sku') && $request['sku']) {
                $product->sku=$request['sku'];
            }
            if ($request->has('description')) {
                $product->description=$request['description'];
            }
            if ($request->has('keywords')) {
                $product->keywords=$request['keywords'];
            }
            if ($request['is_liquid']) {
                $product->is_liquid = true;
            }
            if ($request->has('images')) {
                $database_names=[];
                $images = $request->file('images');
                for ($i=0; $i < count($images); $i++) {
                    $extension = $images[$i]->getClientOriginalExtension();
                    $name = $product->id.'_'.time().'_'.$images[$i]->getClientOriginalName();
                    $this->uploadPhoto( $images[$i] ,$name,$extension);
                    $database_names[$i]=$name.'.'.$extension;
                }
                $product->images=json_encode($database_names);
            }
            $product->save();

            // Return to show method with a success message
            return;
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
    public function destroy(Product $product)
    {
        $response = Gate::inspect('delete',$product);
        if ($response->allowed()){
            $product->delete();
            // Return to dashboard with a message
            return;
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
    public function forceDelete(Product $product)
    {
        $response = Gate::inspect('forceDelete',$product);
        if ($response->allowed()){
            $product->forceDelete();
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
        $product = Product::withTrashed()->find($id);
        $response = Gate::inspect('restore',$product);
        if ($response->allowed()){
            // Do some restore
            $product->restore();
        }
        else{
            echo $response->message();
        }
    }
}
