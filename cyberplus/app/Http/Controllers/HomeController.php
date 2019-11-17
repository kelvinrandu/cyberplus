<?php

namespace Cyberplus\Http\Controllers;


use Illuminate\Http\Request;
use  Auth;
use Session;
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // return view('home');
 
        $user = Auth::user();       //get user object of the logged in user
        Session::put('user', $user); // add user object to session
   
        // check if user account is paid for
        if (!isset($user->paid) || $user->paid == 0 )  {
            return 'not paid';
        }

        return view('home');
        

        // Session::put('user', $user);
        // session()->forget('user.password');
        // dd(session()->get('user.password'));
   
    }
}
