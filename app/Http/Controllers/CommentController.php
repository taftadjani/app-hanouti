<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use App\Comment;
use App\Company;
use App\Currency;
use App\Post;
use App\ProductStore;
use App\Store;
use App\User;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        $comments = Auth::user()->comments;
        return $comments;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Comment::class);
        if ($response->allowed()){
            return view('layouts.comment.create');
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
        $response = Gate::inspect('create', Comment::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'content'=>'bail|required|string',
                'commentable_id'=>'bail|required|numeric',
                'commentable_type'=>'bail|required|string|max:255',
            ]);

            // Store in database
            $comment = Comment::create(
                [
                    'sender_id'=>Auth::id(),
                    'content'=>$request['content'],
                ]
            );

            // Get related datas
            if ( $request['commentable_type'] == 'product_store') {
                $product_store = ProductStore::where('id',$request['commentable_id'])->first();
                if ($product_store) {
                    $comment->commentable_type = 'product_store';
                    $comment->commentable_id = $request['commentable_id'];
                }
            }

            if ( $request['commentable_type'] == 'store') {
                $store = Store::where('id',$request['commentable_id'])->first();
                if ($store) {
                    $comment->commentable_type = 'store';
                    $comment->commentable_id = $request['commentable_id'];
                }
            }

            if ( $request['commentable_type'] == 'post') {
                $post = Post::where('id',$request['commentable_id'])->first();
                if ($post) {
                    $comment->commentable_type = 'post';
                    $comment->commentable_id = $request['commentable_id'];
                }
            }

            if ( $request['commentable_type'] == 'user') {
                $seller = User::where('id',$request['commentable_id'])->first();
                if ($seller) {
                    $comment->commentable_type = 'user';
                    $comment->commentable_id = $request['commentable_id'];
                }
            }

            if ( $request['commentable_type'] == 'company') {
                $company = Company::where('id',$request['commentable_id'])->first();
                if ($company) {
                    $comment->commentable_type = 'company';
                    $comment->commentable_id = $request['commentable_id'];
                }
            }

            $comment->save();

            // Do something after creating brand
            return redirect()->back();
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        $response = Gate::inspect('view', $comment);
        if ($response->allowed()) {
            return view('layouts.comment.show', ['comment'=>$comment]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        $response = Gate::inspect('update',$comment);
        if ($response->allowed()) {
            return view('layouts.comment.edit', ['comment'=>$comment]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        $response = Gate::inspect('update',$comment);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'content'=>'string|nullable',
                'commentable_id'=>'numeric|nullable',
                'commentable_type'=>'string|max:255|nullable',
            ]);

            // Get related datas
            if ($request->has('commentable_type') && $request->has('commentable_id')) {
                if ( $request['commentable_type'] == 'product_store') {
                    $product_store = ProductStore::where('id',$request['commentable_id'])->first();
                    if ($product_store) {
                        $comment->commentable_type = 'product_store';
                        $comment->commentable_id = $request['commentable_id'];
                    }
                }

                if ( $request['commentable_type'] == 'store') {
                    $store = Store::where('id',$request['commentable_id'])->first();
                    if ($store) {
                        $comment->commentable_type = 'store';
                        $comment->commentable_id = $request['commentable_id'];
                    }
                }

                if ( $request['commentable_type'] == 'post') {
                    $post = Post::where('id',$request['commentable_id'])->first();
                    if ($post) {
                        $comment->commentable_type = 'post';
                        $comment->commentable_id = $request['commentable_id'];
                    }
                }

                if ( $request['commentable_type'] == 'user') {
                    $seller = User::where('id',$request['commentable_id'])->first();
                    if ($seller) {
                        $comment->commentable_type = 'user';
                        $comment->commentable_id = $request['commentable_id'];
                    }
                }

                if ( $request['commentable_type'] == 'company') {
                    $company = Company::where('id',$request['commentable_id'])->first();
                    if ($company) {
                        $comment->commentable_type = 'company';
                        $comment->commentable_id = $request['commentable_id'];
                    }
                }
            }

            // Store in database
            $comment->save();

            // Do something after creating comment
            return $this->show($comment);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comment  = Comment::withTrashed()->find($id);
        $response = Gate::inspect('delete',$comment);
        if ($response->allowed()){
            $comment->delete();
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
        $comment  = Comment::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$comment);
        if ($response->allowed()){
            $comment->forceDelete();
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
        $comment  = Comment::withTrashed()->find($id);
        $response = Gate::inspect('restore',$comment);
        if ($response->allowed()){
            // Do some restore
            $comment->restore();
        }
        else{
            echo $response->message();
        }
    }
}
