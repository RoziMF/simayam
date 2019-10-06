<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
    public function home()
    {
        return view('home');
    }


    // public function users()
    // {
    //
    //   if (Auth::user()->type == "1") {
    //     $user = User::where('akses', '=', '1')->get();
    //     return $user;
    //   }elseif (Auth::user()->type == "2") {
    //     $user = User::where('akses', '=', '2')->get();
    //     return $user;
    //   }
    //     $user = User::where('akses', '=', '3')->get();
    //     return $user;
    //
    // }
}
