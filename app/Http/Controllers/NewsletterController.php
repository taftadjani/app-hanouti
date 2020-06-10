<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Newsletter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class NewsletterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsletters=Newsletter::all();
        return $newsletters;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Newsletter::class);
        if ($response->allowed()){
            return view('layouts.newsletter.create');
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
        $response = Gate::inspect('create', Newsletter::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'mail'=>'bail|required|email',
            ]);

            $mail = Mail::where('value', $request['mail'])->get();
            if (count($mail)<=0) {
                $mail = Mail::create(
                    [
                        'inserted_by'=>Auth::id(),
                        'value'=>$request['mail'],
                        'mailable_id'=>Auth::id(),
                        'mailable_type'=>'newsletter',
                    ]
                );
            }else{
                $mail = Mail::where('value', $request['mail'])->first();
            }

            // Store in database
            $newsletter=Newsletter::create(
                [
                    'inserted_by'=>Auth::id(),
                    'mail_id'=>$mail->id,
                ]
            );

            // Do something after creating brand
            return $this->show($newsletter);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function show(Newsletter $newsletter)
    {
        $response = Gate::inspect('view', $newsletter);
        if ($response->allowed()) {
            return view('layouts.newsletter.show',
            ['newsletter'=>$newsletter]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function edit(Newsletter $newsletter)
    {
        $response = Gate::inspect('update',$newsletter);
        if ($response->allowed()) {
            return view('layouts.newsletter.edit', ['newsletter'=>$newsletter]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Newsletter $newsletter)
    {
        $response = Gate::inspect('update',$newsletter);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'mail'=>'bail|required|email',
            ]);

            $mail = $newsletter->mail;
            $mail->value = $request['mail'];
            // Store in database
            $mail->save();
            $newsletter->save();

            // Do something after creating brand
            return $this->show($newsletter);
        }else {
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Newsletter  $newsletter
     * @return \Illuminate\Http\Response
     */
    public function destroy(Newsletter $newsletter)
    {
        $response = Gate::inspect('delete',$newsletter);
        if ($response->allowed()){
            $newsletter->delete();
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
    public function forceDelete(Newsletter $newsletter)
    {
        $response = Gate::inspect('forceDelete',$newsletter);
        if ($response->allowed()){
            $newsletter->forceDelete();
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
    public function restore( $id)
    {
        $newsletter = Newsletter::withTrashed()->find($id);
        $response = Gate::inspect('restore',$newsletter);
        if ($response->allowed()){
            // Do some restore
            $newsletter->restore();
        }
        else{
            echo $response->message();
        }
    }
}
