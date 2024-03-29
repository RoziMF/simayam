<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    // public function login(Request $request){
    //
    //   if (Auth::attempt([
    //     'email' => $request->email,
    //     'password' =>$request->password
    //     ]))
    //   {
    //
    //       $user = User::where('email', $request->email)->first();
    //
    //       if ($user->type == 1) {
    //         return redirect()->route('home');
    //       }elseif ($user->type == 2) {
    //         return redirect()->route('homekaryawan');
    //       }else {
    //         return redirect()->route('homeadmin');
    //       }
    //
    //   }
    //   return redirect()->back();
    //
    // }
}
