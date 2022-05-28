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

      $user =new VehicalType;
      
      $variable=$request->toArray();
      
      foreach ($variable as $key => $value) {
      if($key!='_token')
      $user->$key=$value;
      }
       $user->user_id=$request->user()->id;
        $user->user_name=$request->user()->name;
       
        if($user->save()){
           
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
