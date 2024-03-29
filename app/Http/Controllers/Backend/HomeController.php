<?php

namespace App\Http\Controllers\Backend;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class HomeController extends BackendController
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.adminlte.home.index');
    }

    public function edit(Request $request)
    {
        $user = $request->user();
        return view('backend.adminlte.home.edit', compact('user'));
    }

    public function update(Requests\AccountUpdateRequest $request)
    {
        $user = $request->user();
        $user->update($request->all());

        return redirect()->back()->with('message','Account was update successfully');
    }
    
}
