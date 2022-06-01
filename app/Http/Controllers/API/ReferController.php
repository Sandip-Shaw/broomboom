<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReferDriver;


class ReferController extends Controller
{
    public function show(Request $request)
    {
        $refer=new ReferDriver;
        $x=$request->request;
       $user = $request->user()->id;

        if($x){
            $success['code'] = $user->code;
            return response()->json($success,'200');


        }
        else
        {
            $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $charactersNumber = strlen($characters);
            $codeLength = 6;
        
            $code = '';
        
            while (strlen($code) < 6) {
                $position = rand(0, $charactersNumber - 1);
                $character = $characters[$position];
                $code = $code.$character;
            }
        
            if (ReferDriver::where('code', $code)->exists()) {
                $this->generateUniqueCode();
            }
        
            return $code;
        }


    }
}
