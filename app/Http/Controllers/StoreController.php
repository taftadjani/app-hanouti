<?php

namespace App\Http\Controllers;

use App\Company;
use App\Currency;
use App\Role;
use App\Store;
use App\Traits\UploadsPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class StoreController extends Controller
{
    use UploadsPhotos;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores=Store::simplePaginate(15);
        return view('layouts.store.index',['stores'=>$stores, 'title'=>"All stores"]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function topStores()
    {
        $stores=Store::all()->take(25);
        return view('layouts.store.index',['stores'=>$stores, 'title'=>"Top stores"]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $seller_role = Role::where('reference', config('app.role.seller'))->first();

        $user = Auth::user();
        if ( count($user->roles)<1) {
            // The user doesn't have any role
            $user->roles()->attach($seller_role);
        }
        if (!($user->isSeller() || $user->isAdmin()) ) {
            // authenticated and not seller and not admin : upgrade him as a seller
            $user->roles()->attach($seller_role);
        }

        $response = Gate::inspect('create', Store::class);
        if ($response->allowed()) {
            // Show the form here
            // return Auth::user()->companies->count();
            return view('layouts.store.create',
                [
                    'auth'=>Auth::user(),
                    'currencies'=>Currency::all()
                ]
            );
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
        $response = Gate::inspect('create', Store::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'currency_id'=>'bail|required|numeric',
                'storeable_type'=>'bail|string|max:255',
                'storeable_id'=>'bail|required|numeric',
                'name'=>'bail|required|string|max:255|unique:stores',
                'mail'=>'nullable|email|max:255',
                'phone'=>'nullable|string|max:255',
                'indicatif'=>'nullable|string|max:255',
                'description'=>'nullable|string',
                'keywords'=>'nullable|string',
                'cover'=>'nullable|file',
            ]);

            // Get data
            $currency = Currency::where('id', $request['currency_id'])->first();
            if ($currency == null ) {
                # code...
            }

            // Store data
            $store = Store::create([
                'name'=> $request['name'],
                'description'=> $request['description'],
                'keywords'=> $request['keywords'],
                'storeable_id'=>$request['storeable_id'],
                'storeable_type'=>$request['storeable_type'],
                'currency_id'=>$currency->id,
                'created_by'=>Auth::id(),
                'mail'=>$request['mail'],
            ]);

            // Inserrting the rest of data
            if($request->has('cover_photo')){
                $cover = $request->file('cover_photo');
                $name = $store->id.'_'.time().'_'.$cover->getClientOriginalName();
                $this->uploadPhoto( $cover,$name);
                $store['cover']=$name;
            }

            // Store in database
            $store->save();

            // Do something after creating store
            return redirect()->route('home');
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('layouts.store.show', ['store'=>$store]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store,Request $request)
    {
        $response = Gate::inspect('update',$store);
        if ($response->allowed()) {
            return view('layouts.store.edit',
            [
                'store'=>$store,
                'companies'=>Auth::user()->companies,
                'currencies'=>Currency::all()
            ]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $response = Gate::inspect('update',$store);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'currency_id'=>'nullable|numeric',
                'storeable_type'=>'nullable|string|max:255',
                'storeable_id'=>'nullable|numeric',
                'name'=>'nullable|string|max:255',
                'description'=>'nullable|string',
                'keywords'=>'nullable|string',
                'cover'=>'nullable|string',
                'mail'=>'nullable|email|max:255',
            ]);

            if ($request->has('currency_id') && $request['currency_id']) {
                $store->currency_id=$request['currency_id'];
            }
            if ($request->has('mail') && $request['mail']) {
                $store->mail=$request['mail'];
            }

            if ($request->has('name') && $request['name']) {
                $store->name=$request['name'];
            }

            if ($request->has('cover_photo')) {
                $cover = $request->file('cover_photo');
                $name = $store->id.'_'.time().'_'.$cover->getClientOriginalName();
                $this->uploadPhoto( $cover,$name);
                $store->cover=$name;
            }

            if ($request->has('description') && $request['description']) {
                $store->description=$request['description'];
            }

            if ($request->has('keywords') && $request['keywords']) {
                $store->keywords=$request['keywords'];
            }

            if (($request->has('storeable_type')  && $request['storeable_type']) &&
                ($request->has('storeable_type')  && $request['storeable_type'])) {
                $store->storeable_type=$request['storeable_type'];
                $store->storeable_id=$request['storeable_id'];
            }

            $store->save();

            // Return to show method with a success message : add the message of success
            return redirect()->route('stores.show', ['store'=>$store->id]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
        $response = Gate::inspect('delete',$store);
        if ($response->allowed()){
            $store->delete();
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
    public function forceDelete(Store $store)
    {
        $response = Gate::inspect('forceDelete',$store);
        if ($response->allowed()){
            $store->forceDelete();
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
    public function restore($id)
    {
        $store = Store::withTrashed()->find($id);
        $response = Gate::inspect('restore',$store);
        if ($response->allowed()){
            // Do some restore
            $store->restore();
        }
        else{
            echo $response->message();
        }
    }
}

