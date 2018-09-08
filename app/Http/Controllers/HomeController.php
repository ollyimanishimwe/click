<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where('status','!=','1')->count();
        if( Auth()->User()->status == 1 ){
            return view('dashboard')->with('user', $user);
        }else{
            return view('my_profile');
        }

        
    }
}