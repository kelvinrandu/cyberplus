<?php

namespace Cyberplus\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use App\Store;
use  Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Response;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Validator;

class StoreOwnerController extends Controller
{
    
    // check if user accessing this function is logged in
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('store_owner.dashboard');
      
    }

    // directs admin to add store owner page
    public function getAddStorePage()
    {
        return view('store_owner.add-store');

    }

    // function that creates store 
    public function createStore(Request $request)
    {
 
        //validate user input
        $this->validate($request,[
            'store_name' => 'required|string|max:255|unique:stores',
            'store_email' => 'required|string|email|max:255|unique:stores',
        
        ]);
        $user = Auth::user();
        $owner_id = $user->id;
        $user_name = $request->get('store_name');
        $email = $request->get('store_email');
        $role_id = 3; 
                 

        // insert storeattendant to user table
        $attendant_id = DB::table('users')->insertGetId([
            'user_name' => $user_name,
            'email' =>  $email ,
            'password' => bcrypt('password'),
            'role_id' =>  $role_id,      
           
        ]);      
        // insert store to stores table
        DB::table('stores')->insert([
            'store_name' => $user_name,
            'store_email' =>  $email ,
            'store_phone_number' =>  070000000,
            'type_id' =>  1,
            'owner_id' =>  $owner_id,
            'attendant_id' =>  $attendant_id,
                    
        ]);
     
          return redirect()->back()->with('message','added store  successfully');

        
    }


    public function showStores()
    {
        // get all stores
        $owners = DB::table('users')->where('role_id', '3')->get();
        return view('store_owner.view-all-stores',array('owners' => $owners ));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
