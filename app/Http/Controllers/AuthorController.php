<?php

namespace App\Http\Controllers;

use App\Author;
use App\Traits\UploadsPhotos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class AuthorController extends Controller
{
    use UploadsPhotos;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all()->take(10);
        return $authors;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $response = Gate::inspect('create', Author::class);
        if ($response->allowed()){
            return view('layouts.author.create');
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
        $response = Gate::inspect('create', Author::class);
        if ($response->allowed()) {

            // Validate data
            $request->validate([
                'first_name'=>'bail|required|string|max:255',
                'last_name'=>'bail|required|string|max:255',
                'biography'=>'string|nullable',
                'logo'=>'file|nullable',
            ]);

            $author = Author::create(
                [
                    'first_name'=>$request['first_name'],
                    'last_name'=>$request['last_name'],
                    'biography'=>$request['biography'],
                    'inserted_by'=>Auth::id()
                ]
            );

            if($request->has('logo')){
                $logo = $request->file('logo');
                $name = $author->id.'_'.time().'_'.$logo->getClientOriginalName();
                $this->uploadPhoto( $logo, $name);
                $author['logo']=$name;
            }

            // Store in database
            $author->save();

            // Do something after creating author
            return $this->show($author);
        }else {
            echo $response->message();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('layouts.author.show', ['author'=>$author]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        $response = Gate::inspect('update',$author);
        if ($response->allowed()) {
            return view('layouts.author.edit', ['author'=>$author]);
        }else{
            echo $response->message();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $response = Gate::inspect('update',$author);
        if ($response->allowed()){
            // Validate data
            $request->validate([
                'first_name'=>'string|max:255|nullable',
                'last_name'=>'string|max:255|nullable',
                'biography'=>'string|nullable',
                'logo'=>'file|nullable',
            ]);
            if($request->has('first_name')){
                $author->first_name = $request['first_name'];
            }
            if($request->has('last_name')){
                $author->last_name = $request['last_name'];
            }
            if($request->has('biography')){
                $author->biography = $request['biography'];
            }
            if($request->has('logo')){
                $logo = $request->file('logo');
                $name = $author->id.'_'.time().'_'.$logo->getClientOriginalName();
                $this->uploadPhoto( $logo, $name);
                $author->logo=$name;
            }

            // Store in database
            $author->save();

            // Do something after creating author
            return $this->show($author);
        }
        else{
            echo $response->message();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        $response = Gate::inspect('delete',$author);
        if ($response->allowed()){
            $author->delete();
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
        $author = Author::withTrashed()->find($id);
        $response = Gate::inspect('forceDelete',$author);
        if ($response->allowed()){
            $author->forceDelete();
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
        $author = Author::withTrashed()->find($id);
        $response = Gate::inspect('restore',$author);
        if ($response->allowed()){
            // Do some restore
            $author->restore();
        }
        else{
            echo $response->message();
        }
    }
}
