<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HelpSupport;


class SupportController extends Controller
{
    public function support(Request $request)
    {

        $assistance=new HelpSupport;
        // $assistance=$request->tests;
        $variable=$request->toArray();
        
        foreach ($variable as $key => $value) {
        if($key!='_token')
        $assistance->$key=$value;
        }
        $assistance->user_id=$request->user()->id;
        if($assistance->save()){
            $success['message'] = "You Details Are Posted! We Will Get Back To You Shortly.";
            $success['ack'] = 1;
            return response()->json($success, '200');
        }
        else{
            $success['message'] = "Something Went Wrong";
            $success['ack'] = 0;
            return response()->json($success, '200');
        }
    }

}
