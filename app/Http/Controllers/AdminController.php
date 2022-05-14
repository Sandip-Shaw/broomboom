<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Service;
use App\Models\Blog;





class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function index()
    {
         //dd("admin");
        $contacts=Contact::count();
        $services=Service::count();
        $blogs=Blog::count();
      //  $course=Course::select('name')->groupBy('name')->get();

        // dd(count($course));


        $var['service']=$services;
       $var['contact']=$contacts;
        $var['blog']=$blogs;
       // $var['course']=count($course);
        return view('admin.home')->withVar($var);
    }

    // public function logout( Request $request ){

       
    //     Auth::guard('admin')->logout();
    //     //$request->session()->invalidate();
    //     return redirect('/login');

    //  }
}