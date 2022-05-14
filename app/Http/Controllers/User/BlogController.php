<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blog=Blog::get();
        // #dd($gallery);

        return view('blog')->withBlog($blog);
        
    }
    // public function index1()
    // {
    //     $blogs=Blog::get();
    //     // #dd($gallery);

    //     return view('omrndecBetter')->withBlogs($blogs);
        
    // }
    public function show($id)
    {
       // dd($id);
       //$id=12;
        $image=Blog::find($id);
        //dd( $image);
        return view('omrndecBetter')->withImage($image);
    }
}
