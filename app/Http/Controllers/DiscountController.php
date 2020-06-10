<?php

namespace App\Http\Controllers;

use App\Discount;
use App\Order;
use App\ProductStore;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DiscountController extends Controller
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
        $discounts = Auth::user()->discounts;
        return $discounts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Discount::class);
        if ($response->allowed()){
            return view('layouts.discount.create');
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
        $response = Gate::inspect('create', Discount::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'enabled'=>'boolean|nullable',
                'discountable_id'=>'bail|required|numeric',
                'discountable_type'=>'bail|required|string|max:255',
                'percentage'=>'required|numeric',
                'start_at'=>'date|nullable',
                'end_at'=>'date|nullable',
            ]);

            $discount = Discount::create(
                [
                    'inserted_by'=>Auth::id(),
                    'name'=>$request['name'],
                    'percentage'=>$request['description'],
                    'start_at'=>$request['start_at'],
                    'end_at'=>$request['end_at'],
                ]
            );

            // Get related datas
            if ( $request['discountable_type'] == 'product_store') {
                $product_store = ProductStore::where('id',$request['discountable_id'])->first();
                if ($product_store) {
                    $discount->discountable_type = 'product_store';
                    $discount->discountable_id = $request['discountable_id'];
                }
            }

            if ( $request['discountable_type'] == 'order') {
                $order = Order::where('id',$request['discountable_id'])->first();
                if ($order) {
                    $discount->discountable_type = 'order';
                    $discount->discountable_id = $request['discountable_id'];
                }
            }

            if ( $request['enabled']) {
                $discount->enabled = true;
                if ($request['start_at'] == null) {
                    $discount->start_at = now();
                }
            }

            // Store in database
            $discount->save();

            // Do something after creating discount
            return $this->show($discount);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function show(Discount $discount)
    {
        $response = Gate::inspect('view', $discount);
        if ($response->allowed()) {
            return view('layouts.discount.show', ['discount'=>$discount]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function edit(Discount $discount)
    {
        $response = Gate::inspect('update',$discount);
        if ($response->allowed()) {
            return view('layouts.discount.edit', ['discount'=>$discount]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Discount $discount)
    {
        $response = Gate::inspect('update',$discount);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'enabled'=>'boolean|nullable',
                'discountable_id'=>'numeric|nullable',
                'discountable_type'=>'string|max:255|nullable',
                'percentage'=>'numeric|nullable',
                'start_at'=>'date|nullable',
                'end_at'=>'date|nullable',
            ]);

            if ($request->has('enabled') && $request['enabled']) {
                $discount->enabled = $request['enabled'];
            }

            if (($request->has('discountable_id') && $request['discountable_id']) &&
                ($request->has('discountable_type') && $request['discountable_type'])) {
                    if ( $request['discountable_type'] == 'product_store') {
                        $product_store = ProductStore::where('id',$request['discountable_id'])->first();
                        if ($product_store) {
                            $discount->discountable_type = 'product_store';
                            $discount->discountable_id = $request['discountable_id'];
                        }
                    }

                    if ( $request['discountable_type'] == 'order') {
                        $order = Order::where('id',$request['discountable_id'])->first();
                        if ($order) {
                            $discount->discountable_type = 'order';
                            $discount->discountable_id = $request['discountable_id'];
                        }
                    }
            }

            if ($request->has('percentage') && $request['percentage']) {
                $discount->percentage = $request['percentage'];
            }

            if ($request->has('start_at') && $request['start_at']) {
                $discount->start_at = $request['start_at'];
            }

            if ($request->has('end_at') && $request['end_at']) {
                $discount->end_at = $request['end_at'];
            }

            // Store in database
            $discount->save();

            // Do something after creating discount
            return $this->show($discount);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Discount  $discount
     * @return \Illuminate\Http\Response
     */
    public function destroy(Discount $discount)
    {
        $response = Gate::inspect('delete',$discount);
        if ($response->allowed()){
            $discount->delete();
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
        $discount  = Discount::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$discount);
        if ($response->allowed()){
            $discount->forceDelete();
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
        $discount = Discount::withTrashed()->find($id);
        $response = Gate::inspect('restore',$discount);
        if ($response->allowed()){
            // Do some restore
            $discount->restore();
        }
        else{
            echo $response->message();
        }
    }
}
