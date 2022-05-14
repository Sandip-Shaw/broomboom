<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Image;
use Session;


class ServiceAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $service=Service::all();
        return view('admin.service.index')->withService($service);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request);
        $service=new Service;
        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' & $key!='image_name')
            $service->$key=$value;
        }

        $image=$request->file('image_name');
        //if($request->hasFile('image_name')){
        //dd($image);
        $filename='service'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/images/service/'.$filename);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(800,600)->save($location);
        $service->image=$filename;
        $service->save();        
        //dd("hello");
        session::flash('success', 'The Service Image Has Been Added Successfully!');
        return redirect()->route('service.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // dd($id);
        $image=Service::find($id);
        //dd( $image);
        return view('admin.service.show')->withImage($image);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                //dd($id);
        $service=Service::find($id);
        //dd($banner);
        return view("admin.service.edit")->withImage($service);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        // $gallery=new Gallery;
        $service=Service::find($id);

        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' & $key!='image_name' & $key!='_method')
            $service->$key=$value;
        }

        $image=$request->file('image_name');
        //if($request->hasFile('image_name')){
        //dd($image);
        if(isset($image)){
        $filename='service'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/images/service/'.$filename);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(800,600)->save($location);
        $service->image=$filename;
}
        $service->save();        

        session::flash('success', 'The Service Image Has Been updated Successfully!');
        return redirect()->route('service.index');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
    }

    public function delete($id,Request $request)
    {   
       // dd("hii");
        $service=Service::find($id);
        $service->delete();
        $request->session()->flash('success', 'The Service Item has been deleted.');
        return redirect('/admin/service');
        
        // dd($request); 
    }
}
