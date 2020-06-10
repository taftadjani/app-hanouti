<?php

namespace App\Http\Controllers;

use App\Role;
use App\Traits\UploadsPhotos;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    use UploadsPhotos;

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
        $user = Auth::user();
        return view('profile',['updating'=>false, 'user'=>$user]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user=$user = Auth::user();
        return view('profile',['updating'=>true, 'user'=>$user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Update a user's information
        $user = User::findOrFail(Auth::id());

        if($request->has('first_name')){
            $user['first_name'] = $request['first_name'];
        }

        if($request->has('last_name')){
            $user['last_name'] = $request['last_name'];
        }

        if($request->has('nick_name')){
            $user['nick_name'] = $request['nick_name'];
        }

        if($request->has('email')){
            $user['email'] = $request['email'];
        }

        if($request->has('indicatif')){
            $user['indicatif'] = $request['indicatif'];
        }

        if($request->has('phone')){
            $user['phone'] = $request['phone'];
        }

        if($request->has('birthday')){
            $user['birthday'] = $request['birthday'];
        }

        if($request->has('avatar')){
            $avatar = $request->file('avatar');

            $extension = $avatar->getClientOriginalExtension();
            $name = $user->id.'_'.time().'_'.'user_avatar';
            $this->uploadPhoto( $avatar,$name,$extension);

            // Store in database
            $user['avatar']=$name.'.'.$extension;
        }

        $user->save();

        return redirect()->route('profile.index');
    }

    /**
     * Delete the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $user=User::findOrFail($id);
        $user->delete();
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $roles = Role::all();
        $user=User::findOrFail($id);
        // Detaching roles from this user
        foreach ($roles as $role) {
            $user->roles()->detach($role);
        }
        $user->forceDelete();
    }
}
