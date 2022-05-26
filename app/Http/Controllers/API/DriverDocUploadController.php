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
        // foreach ($request->request as $x) {
        //  echo $x;
        //     }
            
   // $myfile = fopen("newfile.txt", "w") or die("Unable to open file!");
     //$txt = "John Doe\n";
   // fwrite($myfile, $value);
  // dd($request->request[0]);
            $driver=new DriverDoc;
            $x=$request->request;

            $data=$request->toArray();
            
            // dd($x['name']);
// $data=json_decode($request->request, true);
            $driver->name=$data['name'];
            $driver->number=$data['number'];
            $driver->designation=$data['designation'];
            $driver->dl_no=$data['dl_no'];
            $driver->pan_no=$data['pan_no'];
            $driver->adhar_no=$data['adhar_no'];

            $driver->status='A';
// dd($driver);
            $checkDriverExists=DriverDoc::where('dl_no',$driver->dl_no)->first();
			if(isset($checkDriverExists)){
		
			$response = [
		        'message' =>'You are already registered on '.date('d-m-Y',strtotime($checkDriverExists->created_at)).'. We will reachout shortly',
		        'ack'=>0
		    ];
		    return response()->json($response, '200');

		    }

    ##block the entry and show partner exists for DL, PAN, ADHAR 
    #for dl file
	  $file=$request->file('dl_file');
      $filename='drivingLicence-'.rand().time().$file->getClientOriginalName();
      // $extension=$file->getClientOriginalExtension();
      $destinationPath = public_path('images/driverDoc/drivingLicence');
      $file->move($destinationPath,$filename);

	  $driver->dl_file=$filename;
    #end dl file

    #for adhar file
   	  $file=$request->file('adhar_file');
      $filename='adhar-'.rand().time().$file->getClientOriginalName();
      // $extension=$file->getClientOriginalExtension();
      $destinationPath = public_path('images/driverDoc/adhar');
      $file->move($destinationPath,$filename);

	  $driver->adhar_file=$filename;
    #end adhar

    #for pan file

      $file=$request->file('pan_file');
      $filename='pan-'.rand().time().$file->getClientOriginalName();
      // $extension=$file->getClientOriginalExtension();
      $destinationPath = public_path('images/driverDoc/pan');
      $file->move($destinationPath,$filename);

   	   $driver->pan_file=$filename;
    #end pan file

    #for insurance file
    $file=$request->file('insurance_file');
    $filename='insurance-'.rand().time().$file->getClientOriginalName();
    // $extension=$file->getClientOriginalExtension();
    $destinationPath = public_path('images/driverDoc/insurance');
    $file->move($destinationPath,$filename);

        $driver->insurance_file=$filename;
    #end insurance file

    #for rc file
    $file=$request->file('rc_file');
    $filename='RC-'.rand().time().$file->getClientOriginalName();
    // $extension=$file->getClientOriginalExtension();
    $destinationPath = public_path('images/driverDoc/RC');
    $file->move($destinationPath,$filename);

        $driver->rc_file=$filename;

    #end rc file
    //  $driver->save();
     // $list=[];
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
