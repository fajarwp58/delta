<?php

namespace App\Http\Controllers;

use App\User;
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
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $datamember = User::with(['role'])->where('user_id', Auth::User()->user_id)->get();
        if(Auth::user()->role_id == 'R01'){
            return view('home', compact('datamember'));
        }

        else {
            return view('profile', compact('datamember'));
        }

    }
}
