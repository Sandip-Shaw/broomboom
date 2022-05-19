<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\ApiUser;
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

             //return $this->sendResponse($validator->errors());  
            // dd($validator->errors());     
        }
    	
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $input['confirm_password'] = bcrypt($input['confirm_password']);

        $user = ApiUser::create($input);
        if($user){
            $success['token'] =  $user->createToken('token')->accessToken;
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
       // dd($request['email']);
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
        // $user = ApiUser::where('email', $request->email)->first();
        // if ($user) {
        //     if (Hash::check($request->password, $user->password)) {
        $user = $request->user();
        //dd($user);
        $success['token'] =  $user->createToken('token')->accessToken;
        $success['ack'] = 1;
        $success['message'] = "Login successfull..";
        $success['name'] = $user->name;
        $success['email'] = $user->email;
        // $success['number'] = $user->number;
        // $success['dob'] = $user->dob;
        // $success['gender'] = $user->gender;
        // $success['state'] = $user->state;
        // $success['city'] = $user->city;
        // $success['address'] = $user->address;
        // $success['pincode'] = $user->pincode;

        return $this->sendResponse($success);
             }
    //     }
    // }
    
}
