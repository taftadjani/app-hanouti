<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
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
        $company = Auth::user()->companies;
        return $company;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Company::class);
        if ($response->allowed()){
            return view('layouts.company.create');
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
        $response = Gate::inspect('create', Company::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'mail'=>'bail|email|max:255',
                'phone'=>'nullable|string|max:255',
                'indicatif'=>'nullable|string|max:255',
                'description'=>'string|nullable',
            ]);

            // Store in database
            $company = Company::create(
                [
                    'name'=>$request['name'],
                    'mail'=>$request['mail'],
                    'description'=>$request['description'],
                    'inserted_by'=>Auth::id(),
                ]
            );

            // Do something after creating company
            return redirect()->route('home');
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        $response = Gate::inspect('view', $company);
        if ($response->allowed()) {
            return view('layouts.company.show', ['company'=>$company]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        $response = Gate::inspect('update',$company);
        if ($response->allowed()) {
            return view('layouts.company.edit', ['company'=>$company]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Company $company)
    {
        $response = Gate::inspect('update',$company);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'string|max:255|nullable',
                'description'=>'string|nullable',
            ]);
            if ($request->has('name') && $request['name']) {
                $company->name = $request['name'];
            }

            if ($request->has('description') && $request['description']) {
                $company->description = $request['description'];
            }

            // Store in database
            $company->save();

            // Do something after creating company
            return $this->show($company);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Company  $company
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $response = Gate::inspect('delete',$company);
        if ($response->allowed()){
            $company->delete();
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
    public function forceDelete(Company $company)
    {
        $response = Gate::inspect('forceDelete',$company);
        if ($response->allowed()){
            $company->forceDelete();
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
        $company = Company::withTrashed()->find($id);
        $response = Gate::inspect('restore',$company);
        if ($response->allowed()){
            // Do some restore
            $company->restore();
        }
        else{
            echo $response->message();
        }
    }
}
