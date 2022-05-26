<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\VehicalType;
use App\Http\Controllers\API\ResponseController as ResponseController;



class VehicalTypeController extends ResponseController
{
    public function vehical_type(Request $request)
    {
    	 //dd($request['email']);

        $validator = Validator::make($request->all(), [
            'vehical_type' => 'required'
        ]);
         //dd($request['email']);
        if($validator->fails()){
        
        	$error['message'] = $validator->errors()->first('vehical_type');
            $error['ack']=0;
            return $this->sendResponse($error);    
    
        }
       // $user = $request->user();
       $input = $request->all();
       $user = VehicalType::create($input);
       
        if($user){
           
            $success['message'] = "Successfull..";
            $success['ack'] = 1;
           
            $success['vehical_type'] = $user->vehical_type;

           // $success['number'] = $user->number;
            return $this->sendResponse($success);
        }
        else{
            $error['message'] = "Sorry! Unsuccessfull.";
            $error['ack'] = 0;
            return $this->sendResponse($error, 200); 
        }

    }
}
