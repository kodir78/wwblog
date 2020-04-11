<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;

class UserController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('keyword');
        $users = \App\User::paginate(2);
        $status = $request->get('status');
        if($filterKeyword){
            if($status){
                $users = \App\User::where('email', 'LIKE', "%$filterKeyword%")->where('status', $status)->paginate(2);
            } else {
                $users = \App\User::where('email', 'LIKE', "%$filterKeyword%")->paginate(2);
            }
        }
        return view('backend.users.index', compact('users'));
    }
    
    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('backend.users.create');
    }
    
    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
        $this->validate($request,[
            "name" => "required|min:3|max:100",
            "user_roles" => "required",
            "user_phone" => "required|digits_between:10,12",
            "email" => "required|email",
            // "password" => "required",
            // "password_confirmation" => "required|same:password"
            ]);
            
            // $image = $request->image;
            // $new_image = time().$image->getClientOriginalName();
            
            if ($request->input('password')) {
                # Jika password diisi
                User::create([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'email' => $request->email,
                    'user_roles' => $request->user_roles,
                    'user_phone' => $request->user_phone,
                    'password' => bcrypt($request->password),
                    'user_bio' => $request->user_bio,
                    // 'avatar' => 'public/uploads/images/users/'.$new_image,
                    ]);
                } else {
                    # jika password tidak diisi
                    User::create([
                        'name' => $request->name,
                        'slug' => Str::slug($request->name),
                        'email' => $request->email,
                        'user_roles' => $request->user_roles,
                        'user_phone' => $request->user_phone,
                        'password' => bcrypt('12345678'),
                        'user_bio' => $request->user_bio,
                        ]);
                    }
                    
                    // $image->move('public/uploads/images/users/', $new_image);
                    Alert::success('User succesfully created', 'Create Success');
                    return redirect()->route('users.index')->with('status','User succesfully created');
                    
                }
                
                /**
                * Display the specified resource.
                *
                * @param  int  $id
                * @return \Illuminate\Http\Response
                */
                public function show($id)
                {
                    $users = User::findOrFail($id);
                    return view('backend.users.show', compact('users'));
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
                    return view('backend.users.edit', compact('users'));
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
                    $this->validate($request,[
                        "name" => "required|min:3|max:100",
                        "user_roles" => "required",
                        "user_phone" => "required|digits_between:10,12",
                        // "password" => "required",
                        // "password_confirmation" => "required|same:password"
                        ]);
                        
                        $user = User::findOrFail($id);
                        
                        if ($request->input('password')) {
                            # Jika password diisi
                            $user_data = [
                                'name' => $request->name,
                                'slug' => Str::slug($request->name),
                                'user_roles' => $request->user_roles,
                                'user_phone' => $request->user_phone,
                                'user_url' => $request->user_url,
                                'status' => $request->status,
                                'password' => bcrypt($request->password),
                                'user_bio' => $request->user_bio,
                                // 'avatar' => 'public/uploads/images/users/'.$new_image,
                            ];
                        } else {
                            # jika password tidak diisi
                            $user_data = [
                                'name' => $request->name,
                                'slug' => Str::slug($request->name),
                                'user_roles' => $request->user_roles,
                                'user_url' => $request->user_url,
                                'user_phone' => $request->user_phone,
                                'status' => $request->status,
                                'user_bio' => $request->user_bio,
                            ];
                        }
                        $user->update($user_data);
                        // $image->move('public/uploads/images/users/', $new_image);
                        Alert::success('User succesfully Updated', 'Create Success');
                        return redirect()->route('users.index')->with('status','User succesfully Updated');
                    }
                    
                    /**
                    * Remove the specified resource from storage.
                    *
                    * @param  int  $id
                    * @return \Illuminate\Http\Response
                    */
                    public function destroy($id)
                    {
                        //
                    }
                }
                