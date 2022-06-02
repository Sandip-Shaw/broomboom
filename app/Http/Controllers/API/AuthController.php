<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\API\ResponseController as ResponseController;
use Illuminate\Support\Facades\Auth;
use App\Models\ApiUser;
use Illuminate\Support\Str;
use Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

use App\Models\otp;


class AuthController extends ResponseController
{
    public function signup(Request $request)
    {
    	// dd($request['email']);

        $validator = Validator::make($request->all(), [
           // 'name' => 'required|string|',
            'email' => 'required|string|email',
            //'password' => 'required',
          //  'confirm_password' => 'required|same:password',
          //  'mobile' => 'required',
            'otp' => 'required',


        ]);
      //  dd($request['email']);
        if($validator->fails()){
        	
        	$error['message'] = $validator->errors()->first('email');
            $error['ack']=0;
            return $this->sendResponse($error);        
        }
        $otp=otp::where('email',$request['email'])->orderby('created_at','desc')->first();
        //dd($otp);
        if(!isset($otp))
        {
            $error['message'] = "Sorry, OTP did not match";
            $error['ack'] = 0;
            return $this->sendResponse($error, 200); 
        }

    if($otp->otp==$request['otp']){
        $input = $request->all();
        $pwd= str::random(10);
       $input['password'] =  bcrypt($pwd);
       $input['confirm_password'] = bcrypt($pwd);

        $email=$request->email;
       $data['email']=$email;
       $data['otp']=$pwd;
       $data['msg']="Please Use this Password for SignIn ";

        $user = ApiUser::create($input);
        if($user){
            $success['token'] =  $user->createToken('MyApp')->accessToken;
            $success['message'] = "Registration successfull..";
            $success['ack'] = 1;
           // $success['userDetails'] = $user->userDetails;

           Mail::send('email.otp', $data, function($message) use($email){
            $message->from('admin@broomboom.com', 'Broom-Boom');

            $message->to($email,'New User')

                   ->subject('Broom-Boom registration Password');
            });

            if (Mail::failures()) {
				$response = [
				'message' =>'Sorry! Something went wrong while sending Pasword. Try after some time',
				'ack'=>0
				];
				return response()->json($response, '200');
				}

             else{
				$response = [
				'message' =>'successfully sent password ',
				'ack'=>1
				];
				return response()->json($response, '200');
			}

            $success['email'] = $user->email;
          //  $success['mobile'] = $user->mobile;
            return $this->sendResponse($success);

           // $this->attributes['password'] = Hash::make(Str::random(10));
        }
        else{
            $error['message'] = "Sorry! Registration is not successfull.";
            $error['ack'] = 0;
            return $this->sendResponse($error, 200); 
        }
    }else{
            $error['message'] = "Enter a Valid OTP";
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
        //dd($credentials);
        if(!Auth::attempt($credentials)){
            $error['message'] = "Unauthorized";
            $error['ack']="0";
            return $this->sendResponse($error, 200);
        }

      
     $user = $request->user();
    // dd($user->DriverDoc);

    // dd($user->Riderdetails);

      // $user= Auth::user();
        $success['token'] =  $user->createToken('token')->accessToken;
        $success['ack'] = 1;
        $success['message'] = "Login successfull..";
        $success['dl_file_front'] = $user->DriverDoc->dl_file_front;
        $success['vehical_no'] = $user->Riderdetails->vehical_no;


        //$success['name'] = $user->name;
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
