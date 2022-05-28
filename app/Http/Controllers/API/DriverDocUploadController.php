<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DriverDoc;
use Image;

class DriverDocUploadController extends Controller
{
    public function upload(Request $request)
    {
      
            $driver=new DriverDoc;
            $x=$request->request;
            $driver->name=$request->user()->name;
            $data=$request->toArray();
            
          //  $driver->name=$data['name'];
            $driver->number=$data['number'];
            
            $driver->dl_no=$data['dl_no'];
            $driver->rc_no=$data['rc_no'];
            $driver->others_no=$data['others_no'];

            $driver->status='A';

            $checkDriverExists=DriverDoc::where('dl_no',$driver->dl_no)->first();
			if(isset($checkDriverExists)){
		
			$response = [
		        'message' =>'You are already registered on '.date('d-m-Y',strtotime($checkDriverExists->created_at)).'. We will reachout shortly',
		        'ack'=>0
		    ];
		    return response()->json($response, '200');

		    }

    ##block the entry and show partner exists for DL, RC AND OTHERS
    #dl_file_front part
        $file=$request->file('dl_file_front');
        $filename='drivingLicence-front-'.rand().time().$file->getClientOriginalName();
        // $extension=$file->getClientOriginalExtension();
        $destinationPath = public_path('images/driverDoc/drivingLicence');
        $file->move($destinationPath,$filename);
        $driver->dl_file_front=$filename;

    #dl_file_back part
        $file=$request->file('dl_file_back');
        $filename='drivingLicence-back-'.rand().time().$file->getClientOriginalName();
        // $extension=$file->getClientOriginalExtension();
        $destinationPath = public_path('images/driverDoc/drivingLicence');
        $file->move($destinationPath,$filename);
        $driver->dl_file_back=$filename;

    #end dl file

    #for rc_front file
        $file=$request->file('rc_file_front');
        $filename='RC-front-'.rand().time().$file->getClientOriginalName();
        // $extension=$file->getClientOriginalExtension();
        $destinationPath = public_path('images/driverDoc/RC');
        $file->move($destinationPath,$filename);
        $driver->rc_file_front=$filename;

    #for rc_back file
        $file=$request->file('rc_file_back');
        $filename='RC-back-'.rand().time().$file->getClientOriginalName();
        // $extension=$file->getClientOriginalExtension();
        $destinationPath = public_path('images/driverDoc/RC');
        $file->move($destinationPath,$filename);
        $driver->rc_file_back=$filename;

    #end rc_file

    #for others_front file

        $file=$request->file('others_file_front');
        $filename='others-front-'.rand().time().$file->getClientOriginalName();
        // $extension=$file->getClientOriginalExtension();
        $destinationPath = public_path('images/driverDoc/others');
        $file->move($destinationPath,$filename);
        $driver->others_file_front=$filename;

    #for others_back file
        $file=$request->file('others_file_back');
        $filename='others-back-'.rand().time().$file->getClientOriginalName();
        // $extension=$file->getClientOriginalExtension();
        $destinationPath = public_path('images/driverDoc/others');
        $file->move($destinationPath,$filename);
        $driver->others_file_back=$filename;

    #end pan file

     if($driver->save()){
        $success['message'] = "Documents Uploaded Successfull";
        $success['ack'] = 1;
        return response()->json($success, '400');
        }
    else{
        $success['message'] = "Something went wrong, Please try again";
         $success['ack'] = 0;
         return response()->json($success, '200');

        }
    }
}
