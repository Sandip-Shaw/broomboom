<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
	public function __construct()
    {
       $this->middleware('guest:admin',['except'=>['logout']]);
    }   

    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }

    public function login(Request $request)
    {
    	//validate teh for data

    	$a =$this->validate($request,[
    		'email'=>'required|email',
    		'password'=>'required|min:6'
    	]);
		//dd($a);
		//dd(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember));
    	//attempt to log the user  in
		
    	if(Auth::guard('admin')->attempt(['email'=>$request->email,'password'=>$request->password],$request->remember)){

    	// if successfull redirect to intended loc

    		return redirect()->intended(route('adminDashboard'));

    	}


    		return redirect()->back()->withInput($request->only('email','remember'));
    	//not successfull redirect back to login with form data
    }
	public function logout( Request $request ){

       
        Auth::guard('admin')->logout();
        //$request->session()->invalidate();
        return redirect('/admin/login');

     }
	
}
