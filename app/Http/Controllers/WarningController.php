<?php

namespace App\Http\Controllers;

use App\User;
use App\Warning;
use App\WarningType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WarningController extends Controller
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
        $response = Gate::inspect('index', Warning::class);
        if ($response->allowed()){
            $warnings = Warning::all();
            return $warnings;
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
        $response = Gate::inspect('create', Warning::class);
        if ($response->allowed()){
            return view('layouts.warning.create',
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
        $response = Gate::inspect('create', Warning::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'user_id'=>'bail|required|numeric',
                'enabled'=>'boolean|nullable',
                'warning_type_id'=>'numeric|required|bail'
            ]);

            $warningType = WarningType::where('id', $request['warning_type_id'])->first();
            if ($warningType == null) {
                # code...
            }
            $user = User::where('id',$request['user_id'])->first();
            if ($user == null) {
                # code...
                return ;
            }
            // Store in database
            $warning = Warning::create(
                [
                    'name'=>$request['name'],
                    'warning_type_id'=>$warningType->id,
                    'admin_id'=>Auth::id(),
                    'user_id'=>$user->id,
                ]
            );

            // Do something after creating warning
            return $this->show($warning);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function show(Warning $warning)
    {
        $response = Gate::inspect('view', $warning);
        if ($response->allowed()) {
            return view('layouts.warning.show', ['warning'=>$warning]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function edit(Warning $warning)
    {
        $response = Gate::inspect('update',$warning);
        if ($response->allowed()) {
            return view('layouts.warning.edit',
            [
                'warning'=>$warning,
                'warningTypes'=>WarningType::all()
            ]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Warning $warning)
    {
        $response = Gate::inspect('update',$warning);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'user_id'=>'bail|required|numeric',
                'enabled'=>'boolean|nullable',
                'warning_type_id'=>'numeric|required|bail'
            ]);
            if ($request->has('enabled') && $request['enabled']) {
                $warning->enabled = $request['enabled'];
            }

            $warningType = WarningType::where('id', $request['warning_type_id'])->first();
            if ($warningType == null) {
                # code...
            }
            $warning->warning_type_id = $warningType->id;
            $user = User::where('id',$request['user_id'])->first();
            if ($user == null) {
                # code...
                return ;
            }
            $warning->user_id=$user->id;

            // Store in database
            $warning->save();

            // Do something after creating warning
            return $this->show($warning);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Warning  $warning
     * @return \Illuminate\Http\Response
     */
    public function destroy(Warning $warning)
    {
        $response = Gate::inspect('delete',$warning);
        if ($response->allowed()){
            $warning->delete();
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
        $warning  = Warning::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$warning);
        if ($response->allowed()){
            $warning->forceDelete();
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
        $warning = Warning::withTrashed()->find($id);
        $response = Gate::inspect('restore',$warning);
        if ($response->allowed()){
            // Do some restore
            $warning->restore();
        }
        else{
            echo $response->message();
        }
    }
}
