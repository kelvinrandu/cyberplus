<?php

namespace Cyberplus\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
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
 
        $user = Auth::user();       //get user object of the logged in user
        Session::put('user', $user); // add user object to session
   
        // check if user account is paid for
        if ($user->is_paid != 1)  {
            return 'not paid';
        }

        // check the role of the signed in user and direct to their respective dashboard
        switch($user->role_id){
            case 1:
                return redirect()->action('AdminController@index');
                break;

            case 2:
                return redirect()->action('StoreOwnerController@index');
//redirect()->action('StartChoosingController@showAll', ['userTableData' => $user_table_data]);
                
                break;           
            default:
                return redirect()->action('StoreAttendantController@index');

        }

   
    }
}
