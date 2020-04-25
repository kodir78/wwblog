<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Str;

use App\User;

class UserController extends BackendController
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $Pagetitle = "All User";
        $users = User::orderBy('name')->paginate($this->limit);
        $usersCount = User::count();
        return view('backend.adminlte.users.index', compact('users', 'usersCount', 'Pagetitle'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $user = new User();
        return view('backend.adminlte.users.create', compact('user'));
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Requests\UserStoreRequest $request)
    {
        
        $user =  User::create($request->all());
        
        // simpan data roles ke roles_user dengan "attach"
        $user->roles()->attach($request->role);
        
        // $user->attachRole($request->role);
        
        return redirect('/backend/users')->with('message','New User was created successfully');
        
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
        $user = User::findOrFail($id);
        return view('backend.adminlte.users.edit', compact('user'));
    }
    
    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(Requests\UserUpdateRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());
        
        $user->detachRoles();
        //$user->attachRole($request->role);
        
        // Update data roles ke roles_user dengan "sync"
        $user->roles()->sync($request->role);
        
        return redirect('/backend/users')->with('message','User was update successfully');
    }
    
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function destroy(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::findOrFail($id);
        
        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;
        
        if ($deleteOption == "delete") {
            // delete user posts
            $user->posts()->withTrashed()->forceDelete();
        }
        elseif ($deleteOption == "attribute") {
            $user->posts()->withTrashed()->update(['author_id' => $selectedUser]);
        }
        
        $user->delete();
        
        return redirect("/backend/users")->with("message", "User was deleted successfully!");
        // return redirect()->back()->with('message', 'Your User Was Deleted');
    }
    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function confirm(Requests\UserDestroyRequest $request, $id)
    {
        $user = User::findOrfail($id);
        $users = User::where('id', '!=', $user->id)->pluck('name', 'id');
        
        return view("backend.adminlte.users.confirm", compact('user', 'users'));
    }
}
