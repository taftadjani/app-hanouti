<?php

namespace App\Http\Controllers;

use App\Bill;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class BillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill = Bill::all()->take(10);
        return $bill;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Bill::class);
        if ($response->allowed()){
            return view('layouts.bill.create',
            [
                'orders'=>Auth::user()->orders,
                'payments'=>Auth::user()->payments
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
        $response = Gate::inspect('create', Bill::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'order_id '=>'bail|required|numeric',
                'payment_id '=>'bail|required|numeric',
                'amount '=>'bail|required|numeric',
                'paids '=>'boolean|nullable',
            ]);

            $bill = Bill::create(
                [
                    'order_id'=>$request['order_id'],
                    'payment_id'=>$request['payment_id'],
                ]
            );
            if($request->has('amount')){
                $bill->amount=$request['amount'];
            }

            if($request->has('paids') && $request['paids']){
                $bill->paids=true;
            }

            // Store in database
            $bill->save();

            // Do something after creating bill
            return $this->show($bill);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function show(Bill $bill)
    {
        $response = Gate::inspect('view', $bill);
        if ($response->allowed()) {
            return view('layouts.bill.show', [
                'bill'=>$bill,
                'orders'=>Auth::user()->orders,
                'payments'=>Auth::user()->payments
            ]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function edit(Bill $bill)
    {
        $response = Gate::inspect('update',$bill);
        if ($response->allowed()) {
            return view('layouts.bill.edit', ['bill'=>$bill]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bill $bill)
    {
        $response = Gate::inspect('update',$bill);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'order_id '=>'required|numeric|nullable',
                'payment_id '=>'required|numeric|nullable',
                'amount '=>'numeric|nullable',
                'paids '=>'boolean|nullable',
            ]);

            if ($request['order_id']) {
                $bill->order_id=$request['order_id'];
            }

            if ($request['payment_id']) {
                $bill->payment_id=$request['payment_id'];
            }

            if ($request['amount']) {
                $bill->amount=$request['amount'];
            }

            if ($request['paids']) {
                $bill->paids=$request['paids'];
            }

            // Store in database
            $bill->save();

            // Do something after creating bill
            return $this->show($bill);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bill  $bill
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $bill  = Bill::withTrashed()->find($id);
        $response = Gate::inspect('delete',$bill);
        if ($response->allowed()){
            $bill->delete();
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
    public function forceDelete(Bill $bill)
    {
        $response = Gate::inspect('forceDelete',$bill);
        if ($response->allowed()){
            $bill->forceDelete();
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
        $bill = Bill::withTrashed()->find($id);
        $response = Gate::inspect('restore',$bill);
        if ($response->allowed()){
            // Do some restore
            $bill->restore();
        }
        else{
            echo $response->message();
        }
    }
}
