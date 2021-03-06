<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Redirect,Response,DB,Config;
use Mail;
use DateTime;

use App\Models\ApiUser;
use App\Models\otp;


class EmailController extends Controller
{
    public function sendOtp($email)
    {
    	// validate email id
    	
    	$data['email']=$email;
    	$data['otp']=rand(1000,9999);
		$data['msg']="Please enter the OTP in the App to complete registration";
    	// $data['title'] = "This is Test Mail Tuts Make";

    	$checkRecentAttempt=otp::where('email',$email)->orderby('created_at','desc')->first();

    	$checkUserRegistered=ApiUser::where('email',$email)->first();

    	// dd($checkUserRegistered);
		// if the otp ages more than 5 in then create a new one else send a status to use the existing
		$minMins=date('i', mktime(0,0,300));

		if(isset($checkRecentAttempt)){
		
			$response = [
		        'message' =>'You are already registered please try to sign in',
		        'ack'=>0
		    ];
		    return response()->json($response, '200');

		}

		if(isset($checkRecentAttempt)){
		$diff=date_diff(new \DateTime(date('Y-m-d H:i:s e')),$checkRecentAttempt->created_at);
			if($diff->format('%i')<=$minMins){
			$response = [
		        'message' =>'Please use the OTP you have already received a moment ago',
		        'ack'=>1
		    ];
		    return response()->json($response, '200');
			}
		}

		if(!preg_match("/^[_.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+.)+[a-zA-Z]{2,6}$/i", $email)){
				$response = [
				'message' =>'Invalid Email ID',
				'ack'=>0
				];
				return response()->json($response, '200');
				}


        $rgst=new otp;
        $rgst->email=$email;
        $rgst->otp=$data['otp'];
        $rgst->save();

 		Mail::send('email.otp', $data, function($message) use($email){
 			$message->from('admin@broomboom.com', 'Broom-Boom');

            $message->to($email,'New User')
 
                    ->subject('Broom-Boom registration OTP');
        });
 
        if (Mail::failures()) {
				$response = [
				'message' =>'Sorry! Something went wrong while sending OTP. Try after some time',
				'ack'=>0
				];
				return response()->json($response, '200');
				}

        else{
				$response = [
				'message' =>'Please enter the OTP we have sent',
				'ack'=>1
				];
				return response()->json($response, '200');
			}
        }
}
