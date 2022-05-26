<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ApiUser;
use App\Models\vehical;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;



use App\Models\otp;


class AuthController extends ResponseController
{
    public function signup(Request $request)
    {
    	// dd($request['email']);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|',
            'email' => 'required|string|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);
//dd($request['password']);
        if($validator->fails()){
        	
        	$error['message'] = $validator->errors()->first('email');
            $error['ack']=0;
            return $this->sendResponse($error);    

           
        }
    	
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['confirm_password'] = bcrypt($input['confirm_password']);

        $user = ApiUser::create($input);
        if($user){
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['message'] = "Registration successfull..";
            $success['ack'] = 1;
            $success['name'] = $user->name;
            $success['email'] = $user->email;
           // $success['number'] = $user->number;
            return $this->sendResponse($success);
        }
        else{
            $error['message'] = "Sorry! Registration is not successfull.";
            $error['ack'] = 0;
            return $this->sendResponse($error, 200); 
        }

        
    }


    //login
    public function login(Request $request)
    {
      // dd($request['email']);
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required'
        ]);
      
       // dd($request['password']);

       // $validator->error();

        if($validator->fails()){
        	// $validator->getMessageBag()->add('ack',0); 
        	$error['message'] = $validator->errors()->first('email');
            $error['ack']=0;
            return $this->sendResponse($error);       
        }

        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials)){
            $error['message'] = "Unauthorized";
            $error['ack']="0";
            return $this->sendResponse($error, 200);
        }
      
      //  $user = $request->user();
         $user= Auth::user();
       
        $success['token'] =  $user->createToken('token')->accessToken;
        $success['ack'] = 1;
        $success['message'] = "Login successfull..";
        $success['name'] = $user->name;
        $success['email'] = $user->email;
      

        return $this->sendResponse($success);
             }
   



  
}
