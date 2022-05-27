<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EmailController;
use App\Http\Controllers\API\DriverDocUploadController;
use App\Http\Controllers\API\VehicalTypeController;
use App\Http\Controllers\API\SupportController;






/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });





Route::group(['middleware' => ['guest:api']], function () {
    Route::post('/auth/signup', [AuthController::class,'signup']);

    Route::post('/auth/login', [AuthController::class,'login']);
    Route::get('/auth/login', [AuthController::class,'login'])->name('login');

    Route::get('/auth/send-otp/{email}', [EmailConlogintroller::class,'sendOtp']);
   
    
}); 

Route::group(['middleware' => 'auth:api'], function() {  
    Route::post('/auth/choose_vehical', [VehicalTypeController::class,'vehical_type']);
    Route::post('/auth/doc-upload', [DriverDocUploadController::class, 'upload']);
    Route::post('/auth/help-support', [SupportController::class, 'support']);


    
}); 


