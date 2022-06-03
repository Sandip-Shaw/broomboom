<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DriverDoc;
use App\Models\RiderDetail;

use File;
use Image;

class DriverDocUploadController extends Controller
{
    public function upload(Request $request)
    {
      
            $driver=new DriverDoc;
            $x=$request->request;
            $driver->user_id=$request->user()->id;

            //$driver->name=$request->user()->name;
            $data=$request->toArray();
            
          //  $driver->name=$data['name'];
           // $driver->number=$data['number'];
            
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



   //////////////rider_details\\\\\\\\\\\\
    public function riderDetails(Request $request)
    {
        $driver=new RiderDetail;
        $x=$request->request;
        // $driver->name=$request->user()->name;
       // $driver->vehical_type=$request->user()->vehical_type;
        $driver->user_id=$request->user()->id;
        $data=$request->toArray();
        
       $driver->name=$data['name'];
        $driver->mobile=$data['mobile'];
        $driver->vehical_type=$data['vehical_type'];

        $driver->license_validity=$data['license_validity'];
        $driver->vehical_no=$data['vehical_no'];
        $driver->driver_license=$data['driver_license'];
       
        #dl_file_front part
            $file=$request->file('driver_image');
            $filename='driverImage-'.$file->getClientOriginalName();
            // $extension=$file->getClientOriginalExtension();
            $destinationPath = public_path('images/driverDoc/driverImage');
            $file->move($destinationPath,$filename);
            $driver->driver_image=$filename;

            if($driver->save()){
                $success['message'] = "Driver Details Added Successfull";
                $success['ack'] = 1;
                return response()->json($success, '400');
                }
            else{
                $success['message'] = "Something went wrong, Please try again";
                 $success['ack'] = 0;
                 return response()->json($success, '200');
        
                }

     }

     public function getRiderDetails()
     {
 
         $user=RiderDetail::all();
        //dd($user);
         if($user){
            return response()->json($user,'200');
        }
        else{
            $error = "user not found";
            return response()->json($error,'200');
        }

    }

     public function riderDetailsUpdate(Request $request,$id)
     {
        $driver= RiderDetail::find($id);
       // dd($driver);
        $driver->mobile=$request->mobile;
        $driver->vehical_type=$request->vehical_type;
        $driver->license_validity=$request->license_validity;
        $driver->vehical_no=$request->vehical_no;
        $driver->driver_license=$request->driver_license;
      // dd($driver);
        if($request->hasFile('driver_image')){
            if($driver->driver_image){
                $old_path= public_path('images/driverDoc/driverImage/'.$driver->driver_image);
                if(File::exists($old_path)){
                    File::delete($old_path);
                }
            }
            $file=$request->file('driver_image');
            $filename='driverImage-'.$file->getClientOriginalName();
            // $extension=$file->getClientOriginalExtension();
            $destinationPath = public_path('images/driverDoc/driverImage');
            $file->move($destinationPath,$filename);
            $driver->driver_image=$filename;


            if($driver->update()){
                $success['message'] = "Driver Details updated Successfull";
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
}
