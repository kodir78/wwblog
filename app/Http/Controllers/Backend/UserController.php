<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\User;
use App\Post;

class UserController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $width = config('cms.image.thumbnail.width');
        
        $Pagetitle = "All User";
        $default_id = 1;
        $users = User::orderBy('name')->paginate($this->limit);
        $usersCount = User::count();
        return view('backend.adminlte.users.index', compact('users', 'usersCount', 'Pagetitle', 'default_id', 'width'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = new User();
        return view('backend.adminlte.users.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UserStoreRequest $request)
    {
        User::create($request->all());
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
        $users = User::findOrFail($id);
        return view('backend.adminlte.users.edit', compact('users'));
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
        User::findOrFail($id)->update($request->all());
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
        $users = User::findOrfail($id)->delete();
                //$users->delete();
                // Alert::success('Post succesfully Trash', 'Delete Success');
                return redirect()->back()->with('message', 'Your User Was Deleted');
    }
}
