<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ApiUser;
use Illuminate\Support\Facades\Validator;


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
            'confirm_password' => 'required|same:password',
            'otp'=>'required'
        ]);
//dd($request['password']);
        if($validator->fails()){
        	
        	$error['message'] = $validator->errors()->first('email');
            $error['ack']=0;
            return $this->sendResponse($error);    

             //return $this->sendResponse($validator->errors());  
            // dd($validator->errors());     
        }

    	$otp=otp::where('email',$request['email'])->orderby('created_at','desc')->first();
		
		if(!isset($otp))
			{
			$error['message'] = "Sorry, OTP did not match";
			$error['ack'] = 0;
            return $this->sendResponse($error, 200); 
			}

    	if($otp->otp==$request['otp']){
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = ApiUser::create($input);
        if($user){
            $success['token'] =  $user->createToken('token')->accessToken;
            $success['message'] = "Registration successfull..";
            $success['ack'] = 1;
            $success['name'] = $user->name;
            $success['email'] = $user->email;
            $success['number'] = $user->number;
            return $this->sendResponse($success);
        }
        else{
            $error['message'] = "Sorry! Registration is not successfull.";
            $error['ack'] = 0;
            return $this->sendResponse($error, 200); 
        }
       }

       else{
            $error['message'] = "Enter a Valid OTP";
            $error['ack'] = 0;
            return $this->sendResponse($error, 200); 
       }

        
    }
    
}
