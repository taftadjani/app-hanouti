<?php

namespace App\Http\Controllers;

use App\Order;
use App\OrderDetail;
use App\ProductStore;
use App\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrderDetailController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', OrderDetail::class);
        if ($response->allowed()){
            return view('layouts.orderDetail.create',
            [
                'productStores'=>ProductStore::all(),
                'units'=>Unit::all(),
                'orders'=>Order::all()
            ]);
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
        $response = Gate::inspect('create', OrderDetail::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'product_store_id'=>'bail|required|numeric',
                'order_id'=>'bail|required|numeric',
                'unit_id'=>'bail|required|numeric',
                'quantity'=>'bail|required|numeric',
                'status'=>'string|nullable',
                'paids'=>'boolean|nullable',
            ]);

            $orderDetail = OrderDetail::create(
                [
                    'product_store_id'=>$request['product_store_id'],
                    'order_id'=>$request['order_id'],
                    'unit_id'=>$request['unit_id'],
                    'quantity'=>$request['quantity'],
                ]
            );

            if ($request['quantity']) {
                $orderDetail->quantity=$request['quantity'];
               }

            if ($request['paids']) {
            $orderDetail->paids=$request['paids'];
            }

            // Store in database
            $orderDetail->save();

            // Do something after creating orderDetail
            return $this->show($orderDetail);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function show(OrderDetail $orderDetail)
    {
        $response = Gate::inspect('view', $orderDetail);
        if ($response->allowed()) {
            return view('layouts.orderDetail.show', ['orderDetail'=>$orderDetail]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(OrderDetail $orderDetail)
    {
        $response = Gate::inspect('update',$orderDetail);
        if ($response->allowed()) {
            return view('layouts.orderDetail.edit', [
                'productStores'=>ProductStore::all(),
                'units'=>Unit::all(),
                'orders'=>Order::all()
            ]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OrderDetail $orderDetail)
    {
        $response = Gate::inspect('update',$orderDetail);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'product_store_id'=>'numeric|nullable',
                'order_id'=>'numeric|nullable',
                'unit_id'=>'numeric|nullable',
                'quantity'=>'numeric|nullable',
                'status'=>'string|nullable',
                'paids'=>'boolean|nullable',
            ]);
            if ($request->has('product_store_id') && $request['product_store_id']) {
                $orderDetail->product_store_id = $request['product_store_id'];
            }
            if ($request->has('order_id') && $request['order_id']) {
                $orderDetail->order_id = $request['order_id'];
            }
            if ($request->has('unit_id') && $request['unit_id']) {
                $orderDetail->unit_id = $request['unit_id'];
            }
            if ($request->has('quantity') && $request['quantity']) {
                $orderDetail->quantity = $request['quantity'];
            }
            if ($request->has('status') && $request['status']) {
                $orderDetail->status = $request['status'];
            }
            if ($request->has('paids') && $request['paids']) {
                $orderDetail->paids = $request['paids'];
            }

            // Store in database
            $orderDetail->save();

            // Do something after creating orderDetail
            return $this->show($orderDetail);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\OrderDetail  $orderDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(OrderDetail $orderDetail)
    {
        $response = Gate::inspect('delete',$orderDetail);
        if ($response->allowed()){
            $orderDetail->delete();
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
        $orderDetail  = OrderDetail::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$orderDetail);
        if ($response->allowed()){
            $orderDetail->forceDelete();
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
        $orderDetail = OrderDetail::withTrashed()->find($id);
        $response = Gate::inspect('restore',$orderDetail);
        if ($response->allowed()){
            // Do some restore
            $orderDetail->restore();
        }
        else{
            echo $response->message();
        }
    }
}
