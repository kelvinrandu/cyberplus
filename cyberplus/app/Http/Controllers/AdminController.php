<?php

namespace Cyberplus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{

    // check if user accessing this function is logged in
    public function __construct()
    {
        $this->middleware('auth');
    }
 
    // directs admin to dashboard
    public function index()
    {
        return view('admin.dashboard');
    }

    // directs admin to add store owner page
    public function getAddUserPage()
    {
        return view('admin.add-owner');
    }


    // function that creates store owner
    public function createOwner(Request $request)
    {
 
        //validate user input
        $this->validate($request,[
            'user_name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
        
        ]);

        $user_name = $request->get('user_name');
        $email = $request->get('email');
        $role_id = 2 ;

        DB::table('users')->insert([
            'user_name' => $user_name,
            'email' =>  $email ,
            'password' => bcrypt('password'),
            'role_id' =>  $role_id,
           
        ]);
       
          return redirect()->back()->with('message','added store owner successfully');
        
    }


    public function store(Request $request)
    {
        //
    }


    public function showOwners()
    {
        // get all store owners
        $owners = DB::table('users')->where('role_id', '2')->get();
        return view('admin.view-all-owners',array('owners' => $owners ));
      
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
