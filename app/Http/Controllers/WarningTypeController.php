<?php

namespace App\Http\Controllers;

use App\WarningType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class WarningTypeController extends Controller
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
        $response = Gate::inspect('index', WarningType::class);
        if ($response->allowed()){
            $warningTypes = WarningType::all();
            return $warningTypes;
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', WarningType::class);
        if ($response->allowed()){
            return view('layouts.warningType.create',
        [
            'warningTypes'=>WarningType::all()
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
        $response = Gate::inspect('create', WarningType::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'name'=>'bail|required|string|max:255',
                'gravity'=>'numeric|required',
                'description'=>'string|nullable'
            ]);

            // Store in database
            $warningType = WarningType::create(
                [
                    'name'=>$request['name'],
                    'gravity'=>$request['gravity'],
                    'description'=>$request['description'],
                ]
            );

            // Do something after creating warningType
            return $this->show($warningType);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WarningType  $warningType
     * @return \Illuminate\Http\Response
     */
    public function show(WarningType $warningType)
    {
        $response = Gate::inspect('view', $warningType);
        if ($response->allowed()) {
            return view('layouts.warningType.show', ['warningType'=>$warningType]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WarningType  $warningType
     * @return \Illuminate\Http\Response
     */
    public function edit(WarningType $warningType)
    {
        $response = Gate::inspect('update',$warningType);
        if ($response->allowed()) {
            return view('layouts.warningType.edit',
            [
                'warningType'=>$warningType,
            ]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WarningType  $warningType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WarningType $warningType)
    {
        $response = Gate::inspect('update',$warningType);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'name'=>'nullable|string|max:255',
                'gravity'=>'numeric|nullable',
                'description'=>'string|nullable'
            ]);
            if ($request->has('name') && $request['name']) {
                $warningType->name = $request['name'];
            }
            if ($request->has('gravity') && $request['gravity']) {
                $warningType->gravity = $request['gravity'];
            }
            if ($request->has('description') && $request['description']) {
                $warningType->description = $request['description'];
            }
            // Store in database
            $warningType->save();

            // Do something after creating warningType
            return $this->show($warningType);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WarningType  $warningType
     * @return \Illuminate\Http\Response
     */
    public function destroy(WarningType $warningType)
    {
        $response = Gate::inspect('delete',$warningType);
        if ($response->allowed()){
            $warningType->delete();
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
        $warningType  = WarningType::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$warningType);
        if ($response->allowed()){
            $warningType->forceDelete();
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
        $warningType = WarningType::withTrashed()->find($id);
        $response = Gate::inspect('restore',$warningType);
        if ($response->allowed()){
            // Do some restore
            $warningType->restore();
        }
        else{
            echo $response->message();
        }
    }
}
