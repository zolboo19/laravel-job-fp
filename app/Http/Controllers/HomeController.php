<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        //$jobs = Auth::user()->favourite;
        //dd($jobs);
        if(Auth::user()->user_type == 'employer'){
            return redirect()->to('/company/create');
        }

        $adminRole = Auth::user()->roles()->pluck('name');
        if($adminRole->contains('admin')){
            return redirect('/dashboard');
        }
    }
}
