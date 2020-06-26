<?php

namespace App\Http\Controllers;

use App\Cart;
use App\CartDetail;
use App\Currency;
use App\Delivery;
use App\DeliveryMode;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\PaymentMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Mockery\Undefined;

class CartController extends Controller
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
        $carts = Auth::user()->carts;
        return $carts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Cart::class);
        if ($response->allowed()){
            return view('layouts.cart.create', ['currencies'=>Currency::all()]);
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
        $response = Gate::inspect('create', Cart::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'currency_id'=>'bail|required|numeric',
            ]);

            // Get related datas
            $currency=Currency::where('id',$request['currency_id'])->first();
            if ($currency == null) {
                # code...
            }

            // Store in database
            $cart = Cart::create(
                [
                    'name'=>$request['name'],
                    'user_id'=>Auth::id(),
                    'currency_id'=>$currency->id,
                ]
            );
            // Do something after creating brand
            return redirect()->route('home');
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        $response = Gate::inspect('view', $cart);
        if ($response->allowed()) {
            return view('layouts.cart.show', [
                'cart'=>$cart,
                'auth'=>Auth::user()
                ]);
        }else{
            echo $response->message();
        }
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function deleteShow()
    {
        if (Auth::user()->carts->count() <=1  ) {
            return back();
        }
        return view('layouts.cart.cartsShow', [
                'carts'=>Auth::user()->carts,
                ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function deleteCarts(Request $request)
    {
        // return  $request['carts_id'][0];
        $request->validate([
            'carts_id'=>'bail|required|array',
        ]);
        $user_cart_count = Auth::user()->carts->count();

        if ($user_cart_count>count($request['carts_id'])) {
            foreach ($request['carts_id'] as $key => $cart_id) {
                $cart = Cart::where('id', $cart_id)->first();
                    $no = $this->destroy($cart);
                }
        }
        return redirect()->route('home');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        $response = Gate::inspect('update',$cart);
        if ($response->allowed()) {
            return view('layouts.cart.edit', ['cart'=>$cart,'currencies'=>Currency::all()]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        $response = Gate::inspect('update',$cart);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'string|max:255|nullable',
                'currency_id'=>'numeric|nullable',
            ]);
            if ($request->has('name') && $request['name']) {
                $cart->name = $request['name'];
            }
            if ($request->has('currency_id') && $request['currency_id']) {
                $cart->currency_id = $request['currency_id'];
            }

            // Store in database
            $cart->save();

            // Do something after creating cart
            return $this->show($cart);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $response = Gate::inspect('delete',$cart);
        if ($response->allowed()){

            $cart->delete();
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
        $cart  = Cart::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$cart);
        if ($response->allowed()){
            $cart->forceDelete();
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
        $cart = Cart::withTrashed()->find($id);
        $response = Gate::inspect('restore',$cart);
        if ($response->allowed()){
            // Do some restore
            $cart->restore();
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Determine whether the user can clearCart(delete all cartdetails related) the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function clear(Cart $cart)
    {
        $response = Gate::inspect('clear', $cart);
        if ($response->allowed()){
            // Do some cleaning
            $cartDetailController = new CartDetailController();
            foreach ($cart->cartDetails as $cartDetail) {
                # code...
                $noReturn=$cartDetailController->destroy($cartDetail);
            }
            return redirect()->back();
        }
        else{
            echo $response->message();
        }
    }



    /**
     * Determine whether the user can order Cart the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function getOrderInfo(Cart $cart)
    {
        $response = Gate::inspect('order',$cart);
        if ($response->allowed()){
            $payments = PaymentMethod::all();
            $deliveries = Auth::user()->deliveries;
            return view('orderInfo' ,compact('cart', 'payments','deliveries'));
        }
        else{
            echo $response->message();
        }
        return redirect()->back();
    }

    /**
     * Determine whether the user can order Cart the model.
     *
     * @param  \App\User  $user
     * @param  \App\Product  $product
     * @return mixed
     */
    public function order(Request $request)
    {
        $request->validate([
            'cart'=>'numeric|required',
            'payment_method'=>'numeric|required',
            'delivery'=>'numeric|required',
        ]);
        $cart = Cart::where('id',$request['cart'])->first();
        $payment_method_id = $request['payment_method'];
        $delivery_id = $request['delivery'];
        $order_by = Auth::id();
        $response = Gate::inspect('order',$cart);
        if ($response->allowed()){
            if ($cart->cartDetails->count()<1) {
                return "Pas de produits dans le panier";
            }
            // Do some cleaning
            $currency_id = Auth::user()->city->country->currency->id;
            // $request['currency_id']=$currency_id;
            $order =Order::create([
                'currency_id' =>$currency_id,
                'delivery_id' =>$delivery_id,
                'order_by' =>$order_by,
            ]);
            $order_id = $order->id;

            // Calculer la valeur

            $value = 0;

            $payment=Payment::create([
                'payment_method_id'=>$payment_method_id,
                'order_id'=>$order_id,
                'paids'=>0,
                'amount'=>$value,
                'user_id'=>Auth::id()
            ]);

            // Creer les orderDetails
            foreach ($cart->cartDetails as $cartDetail) {
                OrderDetail::create([
                    'product_store_id'=>$cartDetail->product_store_id,
                    'order_id'=>$order_id,
                    'unit_id'=>$cartDetail->unit_id,
                    'price_id'=>$cartDetail->price_id,
                    'quantity'=>$cartDetail->quantity,
                ]);
                CartDetailController::destroy($cartDetail);
            }

            return redirect()->route('home');
        }
        else{
            echo $response->message();
        }
        return redirect()->back();
    }
}
