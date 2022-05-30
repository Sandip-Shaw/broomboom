<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
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
    // dd($request->request);
        $validator = Validator::make($request->all(), [
            'email' => 'required|string',
            'password' => 'required'
        ]);

      
        //dd($request['email']);

      

        if($validator->fails()){
        	
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

      
     $user = $request->user();
       // $user= Auth::user();
        $success['token'] =  $user->createToken('token')->accessToken;
        $success['ack'] = 1;
        $success['message'] = "Login successfull..";
        $success['name'] = $user->name;
        $success['email'] = $user->email;

        return $this->sendResponse($success);
     }
   


    //getuser
    public function getUser(Request $request)
    {
        //$id = $request->user()->id;
        $user = $request->user();
        if($user){
            return $this->sendResponse($user);
        }
        else{
            $error = "user not found";
            return $this->sendResponse($error);
        }
    }


    public function getAllUser()
    {

    	$user=ApiUser::all();

        if(!$user){
            $error = "Something Went Wrong";
            return $this->sendError($error, 401);
        }
        return $this->sendResponse($user);
    }

}
