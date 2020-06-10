<?php

namespace App\Http\Controllers;

use App\Order;
use App\Payment;
use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PaymentController extends Controller
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
        $payments = Auth::user()->payments;
        return $payments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Payment::class);
        if ($response->allowed()){
            return view('layouts.paymentMethod.create',
            [
                'paymentMethods'=>PaymentMethod::all(),
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
        $response = Gate::inspect('create', Payment::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'payment_method_id'=>'bail|required|numeric',
            ]);

            // Get related datas
            $paymentMethod=PaymentMethod::where('id',$request['payment_method_id'])->first();
            if ($paymentMethod == null) {
                # code...
            }

            // Store in database
            $payment = Payment::create(
                [
                    'user_id'=>Auth::id(),
                    'payment_method_id'=>$paymentMethod->id,
                ]
            );
            // Do something after creating brand
            return $this->show($paymentMethod);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        $response = Gate::inspect('view', $payment);
        if ($response->allowed()) {
            return view('layouts.payment.show', ['payment'=>$payment]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        $response = Gate::inspect('update',$payment);
        if ($response->allowed()) {
            return view('layouts.payment.edit', ['payment'=>$payment,'paymentMethods'=>PaymentMethod::all()]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        $response = Gate::inspect('update',$payment);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'payment_method_id'=>'bail|required|numeric',
            ]);
            if ($request['payment_method_id']) {
                $payment->payment_method_id = $request['payment_method_id'];
            }
            // Store in database
            $payment->save();

            // Do something after creating payment
            return $this->show($payment);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        $response = Gate::inspect('delete',$payment);
        if ($response->allowed()){
            $payment->delete();
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
    public function forceDelete($id)
    {
        $payment  = Payment::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$payment);
        if ($response->allowed()){
            $payment->forceDelete();
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
        $payment = Payment::withTrashed()->find($id);
        $response = Gate::inspect('restore',$payment);
        if ($response->allowed()){
            // Do some restore
            $payment->restore();
        }
        else{
            echo $response->message();
        }
    }
}
