<?php

namespace Cyberplus\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use App\User;


class PassportController extends Controller
{
    public $successStatus = 200;
     /**
     *Login function

     */
    public function login(Request $request)
    {

        
        if(Auth::attempt(['email'=>request('email'),'password'=>request('password')])){
           
            $user = Auth::user();
            $success['token']= $user->createToken('MyApp')->
            accessToken;
               $success['user']= $user;
            return response()->json(['success'=>$success],$this
            ->successStatus);
     
          }else{
            return response()->json(['error'=>'Unauthorised'], 401);
      
            }


    }
}
