<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Support;


class SupportController extends Controller
{
    public function support(Request $request)
    {

        $assistance=new Support;
        // $assistance=$request->tests;
        $variable=$request->toArray();
        // dd($variable['tests']);
        // dd($variable['pickup_time']);
        foreach ($variable as $key => $value) {
        if($key!='_token')
        $assistance->$key=$value;
        }

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
