<?php

namespace App\Http\Controllers;

use App\Currency;
use App\Delivery;
use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class OrderController extends Controller
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
        $orders = Auth::user()->orders;
        return $orders;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Order::class);
        if ($response->allowed()){
            return view('layouts.order.create',
                [
                    'currencies'=>Currency::all(),
                    "deliveries"=>Auth::user()->deliveries
                ]
            );
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
        $response = Gate::inspect('create', Order::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'currency_id'=>'bail|required|numeric',
                'status'=>'nullable|boolean',
                'delivery_id'=>'bail|required|numeric',
            ]);

            $deliveries = Auth::user()->deliveries->where('id', $request['delivery_id'])->get();
            if (count($deliveries) <=0 ) {
                # code...
            }
            $delivery = $deliveries[0];

            // Store in database
            $order = Order::create(
                [
                    'order_by'=>Auth::id(),
                    'delivery_id'=>$delivery->id,
                    'currency_id'=>$request['currency_id'],
                    'status'=>$request['status']
                ]
            );
            // Do something after creating order
            return $this->show($order);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        $response = Gate::inspect('view', $order);
        if ($response->allowed()) {
            return view('layouts.order.show', ['order'=>$order]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        $response = Gate::inspect('update',$order);
        if ($response->allowed()) {
            return view('layouts.order.edit',
            [
                'order'=>$order,
                'currencies'=>Currency::all(),
                "deliveries"=>Auth::user()->deliveries
            ]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $response = Gate::inspect('update',$order);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'currency_id'=>'numeric|nullable',
                'status'=>'boolean|nullable',
                'delivery_id'=>'numeric|nullable',
            ]);

            if ($request->has('currency_id')  && $request['currency_id']) {
                $order->currency_id = $request['currency_id'];
            }

            if ($request->has('delivery_id')  && $request['delivery_id']) {
                $order->delivery_id = $request['delivery_id'];
            }

            if ($request->has('status')  && $request['status']) {
                $order->status = $request['status'];
            }

            // Store in database
            $order->save();

            // Do something after creating order
            return $this->show($order);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $response = Gate::inspect('delete',$order);
        if ($response->allowed()){
            $order->delete();
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
        $order  = Order::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$order);
        if ($response->allowed()){
            $order->forceDelete();
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
        $order = Order::withTrashed()->find($id);
        $response = Gate::inspect('restore',$order);
        if ($response->allowed()){
            // Do some restore
            $order->restore();
        }
        else{
            echo $response->message();
        }
    }
}
