<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        $service=Service::get();
        // #dd($gallery);

        return view('service')->withService($service);
        
    }

   
}
