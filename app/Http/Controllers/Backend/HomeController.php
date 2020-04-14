<?php

namespace App\Http\Controllers\Backend;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class HomeController extends BackendController
{
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $a = 34;

        //Alert::success('Welcome', 'Login Success');
        // return view('backend.stisla.dashboard');
        return view('backend.adminlte.dashboard', compact('a'));
    }
}
