<?php

namespace App\Http\Controllers;

use App\Post;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
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
        $posts = Auth::user()->posts;
        return $posts;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Post::class);
        if ($response->allowed()){
            return view('layouts.post.create', ['stores'=>Store::all()]);
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
        $response = Gate::inspect('create', Post::class);
        if ($response->allowed()) {
            // Validate data
            $request->validate([
                'content'=>'bail|required|string',
                'store_id'=>'bail|required|numeric',
            ]);

            // Get related datas
            $store=Store::where('id',$request['store_id'])->first();
            if ($store == null) {
                # code...
            }
            // Store in database
            $post = Post::create(
                [
                    'content'=>$request['content'],
                    'posted_by'=>Auth::id(),
                    'store_id'=>$store->id,
                ]
            );
            // Do something after creating brand
            return $this->show($post);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $response = Gate::inspect('view', $post);
        if ($response->allowed()) {
            return view('layouts.post.show', ['post'=>$post]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $response = Gate::inspect('update',$post);
        if ($response->allowed()) {
            return view('layouts.post.edit', ['post'=>$post,'stores'=>Store::all()]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $response = Gate::inspect('update',$post);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'content'=>'string|nullable',
                'store_id'=>'numeric|nullable',
            ]);
            if ($request->has('content') && $request['content']) {
                $post->content = $request['content'];
            }
            if ($request->has('store_id') && $request['store_id']) {
                $post->store_id = $request['store_id'];
            }

            // Store in database
            $post->save();

            // Do something after creating post
            return $this->show($post);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $response = Gate::inspect('delete',$post);
        if ($response->allowed()){
            $post->delete();
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
        $post  = Post::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$post);
        if ($response->allowed()){
            $post->forceDelete();
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
        $post = Post::withTrashed()->find($id);
        $response = Gate::inspect('restore',$post);
        if ($response->allowed()){
            // Do some restore
            $post->restore();
        }
        else{
            echo $response->message();
        }
    }
}
