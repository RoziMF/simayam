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
        return view('homecustomer');
    }

    public function homekaryawan()
    {
        return view('homekaryawan');
    }

    public function homeadmin()
    {
        return view('homeadmin');
    }


    public function users()
    {

      if (Auth::user()->akses == "3") {
        $user = User::where('akses', '=', '1')->get();
        return $user;
      }else {
        $user = User::where('akses', '=', '3')->get();
        // $user = DB::table('users')->where('akses', 3)->first();
        return $user;
      }

    }
}
