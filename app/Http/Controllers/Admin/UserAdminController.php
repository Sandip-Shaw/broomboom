<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;

use Image;
use Session;

class UserAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=User::all();
       // dd($blog);
        return view('admin.blog.index')->withUser($user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
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
        $blog=new Blog;
        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' & $key!='image_name')
            $blog->$key=$value;
        }

        $image=$request->file('image_name');
        //if($request->hasFile('image_name')){
        //dd($image);
        $filename='blog'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/images/blog/'.$filename);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(800,600)->save($location);
        $blog->image=$filename;
        $blog->save();        
       //dd("hello");
        session::flash('success', 'The Blog Image Has Been Added Successfully!');
        return redirect()->route('blog.index');


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
        $image=Blog::find($id);
        //dd( $image);
        return view('admin.blog.show')->withImage($image);
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
        $blog=Blog::find($id);
        //dd($banner);
        return view("admin.blog.edit")->withImage($blog);
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
        $blog=Blog::find($id);

        $variable=$request->toArray();
        foreach ($variable as $key => $value) {
           if($key!='_token' & $key!='image_name' & $key!='_method')
            $blog->$key=$value;
        }

        $image=$request->file('image_name');
        //if($request->hasFile('image_name')){
        //dd($image);
        if(isset($image)){
        $filename='blog'.'-'.rand().time().'.'.$image->getClientOriginalExtension();//part of image intervention library
        $location=public_path('/images/blog/'.$filename);

        // use $location='images/'.$filename; on a server

        Image::make($image)->resize(800,600)->save($location);
        $blog->image=$filename;
}
        $blog->save();        

        session::flash('success', 'The Blog Image Has Been updated Successfully!');
        return redirect()->route('blog.index');



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
        $blog=Blog::find($id);
        $blog->delete();
        $request->session()->flash('success', 'The Blog Item has been deleted.');
        return redirect('/admin/blog');
        
        // dd($request); 
    }
}
