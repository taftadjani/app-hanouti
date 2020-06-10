<?php

namespace App\Http\Controllers;

use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class LanguageController extends Controller
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
        $languages = Auth::user()->languages;
        return $languages;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Language::class);
        if ($response->allowed()){
            return view('layouts.language.create');
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
        $response = Gate::inspect('create', Language::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'value'=>'bail|required|string|max:255',
                'iso_code'=>'string|max:255|nullable',
                'description'=>'string|max:255|nullable',
            ]);

            // Store in database
            $language = Language::create(
                [
                    'user_id'=>Auth::id(),
                    'iso_code'=>$request['iso_code'],
                    'description'=>$request['description'],
                ]
            );

            // Do something after creating language
            return $this->show($language);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        $response = Gate::inspect('view', $language);
        if ($response->allowed()) {
            return view('layouts.language.show', ['language'=>$language]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        $response = Gate::inspect('update',$language);
        if ($response->allowed()) {
            return view('layouts.language.edit', ['language'=>$language]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        $response = Gate::inspect('update',$language);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'value'=>'string|max:255|nullable',
                'iso_code'=>'string|max:255|nullable',
                'description'=>'string|max:255|nullable',
            ]);

            if($request->has('iso_code') && $request['iso_code']){
                $language->iso_code = $request['iso_code'];
            }

            if($request->has('description') && $request['description']){
                $language->description = $request['description'];
            }

            // Store in database
            $language->save();

            // Do something after creating language
            return $this->show($language);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        $response = Gate::inspect('delete',$language);
        if ($response->allowed()){
            $language->delete();
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
        $language  = Language::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$language);
        if ($response->allowed()){
            $language->forceDelete();
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
        $language = Language::withTrashed()->find($id);
        $response = Gate::inspect('restore',$language);
        if ($response->allowed()){
            // Do some restore
            $language->restore();
        }
        else{
            echo $response->message();
        }
    }
}
