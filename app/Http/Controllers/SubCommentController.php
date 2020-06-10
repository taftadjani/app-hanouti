<?php

namespace App\Http\Controllers;

use App\Comment;
use App\SubComment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class SubCommentController extends Controller
{
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', SubComment::class);
        if ($response->allowed()){
            return view('layouts.subComment.create');
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
        // return "ok";
        $response = Gate::inspect('create', SubComment::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'content'=>'bail|string|required',
                'comment_id'=>'bail|required|numeric',
            ]);
            $comment = Comment::where('id', $request['comment_id'])->first();
            if ($comment == null) {
                # code...
            }
            // Store in database
            $subComment = SubComment::create(
                [
                    'sender_id'=>Auth::id(),
                    'content'=>$request['content'],
                    'comment_id'=>$comment->id,
                ]
            );
            // Do something after creating brand
            return redirect()->back();
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SubComment  $subComment
     * @return \Illuminate\Http\Response
     */
    public function show(SubComment $subComment)
    {
        $response = Gate::inspect('view', $subComment);
        if ($response->allowed()) {
            return view('layouts.subComment.show', ['subComment'=>$subComment]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubComment  $subComment
     * @return \Illuminate\Http\Response
     */
    public function edit(SubComment $subComment)
    {
        $response = Gate::inspect('update',$subComment);
        if ($response->allowed()) {
            return view('layouts.subComment.edit', ['subComment'=>$subComment]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubComment  $subComment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubComment $subComment)
    {
        $response = Gate::inspect('update',$subComment);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'content'=>'bail|string|required',
                'comment_id'=>'nullable|numeric',
            ]);
            $subComment->content = $request['content'];

            if ($request->has('comment_id') && $request['comment_id']) {
                $subComment->comment_id = $request['comment_id'];
            }

            // Store in database
            $subComment->save();

            // Do something after creating subComment
            return $this->show($subComment);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubComment  $subComment
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubComment $subComment)
    {
        $response = Gate::inspect('delete',$subComment);
        if ($response->allowed()){
            $subComment->delete();
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
        $subComment  = SubComment::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$subComment);
        if ($response->allowed()){
            $subComment->forceDelete();
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
        $subComment = SubComment::withTrashed()->find($id);
        $response = Gate::inspect('restore',$subComment);
        if ($response->allowed()){
            // Do some restore
            $subComment->restore();
        }
        else{
            echo $response->message();
        }
    }
}
