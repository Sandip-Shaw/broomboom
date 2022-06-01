<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\EmailController;
use App\Http\Controllers\API\DriverDocUploadController;
use App\Http\Controllers\API\VehicalTypeController;
use App\Http\Controllers\API\SupportController;
use App\Http\Controllers\API\ReferController;







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

    Route::get('/auth/send-otp/{email}', [EmailController::class,'sendOtp']);
    Route::get('/auth/getAllUser', [AuthController::class,'getAllUser']);
   
    
}); 

Route::group(['middleware' => 'auth:api'], function() {  
    Route::post('/auth/choose_vehical', [VehicalTypeController::class,'vehical_type']);
    Route::post('/auth/doc-upload', [DriverDocUploadController::class, 'upload']);
    Route::post('/auth/help-support', [SupportController::class, 'support']);
    Route::get('/auth/getUser', [AuthController::class,'getUser']);
    Route::get('/auth/getUser', [AuthController::class,'getUser']);
    Route::post('/auth/riderDetails', [DriverDocUploadController::class, 'riderDetails']);
    Route::get('/auth/getRiderDetails', [DriverDocUploadController::class,'getRiderDetails']);

    Route::post('/auth/riderDetailsUpdate/{id}', [DriverDocUploadController::class, 'riderDetailsUpdate']);
    Route::get('/auth/referralCode', [ReferController::class,'show']);




    
}); 


