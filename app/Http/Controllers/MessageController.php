<?php

namespace App\Http\Controllers;

use App\Message;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class MessageController extends Controller
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
        $messages = Auth::user()->messages;
        return $messages;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Message::class);
        if ($response->allowed()){
            return view('layouts.message.create',
            [
                'users'=>User::all()
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
        $response = Gate::inspect('create', Message::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'receiver_id'=>'bail|required|numeric',
                'content'=>'bail|required|string',
            ]);

            // Store in database
            $receiver = User::where('id', $request['receiver_id']);
            $message = Message::create(
                [
                    'sender_id'=>Auth::id(),
                    'receiver_id'=>$receiver->id,
                    'content'=>$request['content'],
                ]
            );
            // Do something after creating message
            return $this->show($message);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {
        $response = Gate::inspect('view', $message);
        if ($response->allowed()) {
            return view('layouts.message.show', ['message'=>$message]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        $response = Gate::inspect('update',$message);
        if ($response->allowed()) {
            return view('layouts.message.edit', ['message'=>$message]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $response = Gate::inspect('update',$message);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'receiver_id'=>'bail|required|numeric',
                'content'=>'bail|required|string',
            ]);
            if ($request->has('content')  && $request['content']) {
                $message->content = $request['content'];
            }

            // Store in database
            $message->save();

            // Do something after creating message
            return $this->show($message);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        $response = Gate::inspect('delete',$message);
        if ($response->allowed()){
            $message->delete();
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
        $message  = Message::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$message);
        if ($response->allowed()){
            $message->forceDelete();
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
        $message = Message::withTrashed()->find($id);
        $response = Gate::inspect('restore',$message);
        if ($response->allowed()){
            // Do some restore
            $message->restore();
        }
        else{
            echo $response->message();
        }
    }
}
