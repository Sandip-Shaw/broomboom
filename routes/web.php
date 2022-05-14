<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Contact;

use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Admin\ContactAdminController;
use App\Http\Controllers\Admin\ServiceAdminController;
use App\Http\Controllers\Admin\BlogAdminController;
use App\Http\Controllers\User\ServiceController;
use App\Http\Controllers\User\BlogController;
use App\Http\Controllers\User\HomeController;






/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Route::get('/', function () {
//     return view('home');
// })->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

// Route::get('/service', function () {
//     return view('service');
// })->name('service');

// Route::get('/blog', function () {
//     return view('blog');
// })->name('blog');

// Route::get('/contact', function () {
//     return view('contact');
// })->name('contact');
Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/service', [ServiceController::class,'index'])->name('service');
Route::get('/blog', [BlogController::class,'index'])->name('blog');
Route::get('/omrndecBetter/{id}', [BlogController::class,'show'])->name('omrndecBetter');


Route::get('/contact', [ContactController::class, 'index'])->name('contact');

Route::post('/contact', [ContactController::class, 'store'])->name('usercontact.store');

Route::prefix('admin')->group(function() {
    Route::get('/login', [AdminLoginController::class,'showLoginForm'])->name('admin.login');
    Route::post('/login',[AdminLoginController::class,'login'])->name('admin.login.submit');
    Route::get('/', [AdminController::class,'index'])->name('adminDashboard');
    #Route::resource('contact', 'Admin\ContactController');
    Route::resource('contact', ContactAdminController::class);
    Route::resource('service', ServiceAdminController::class);
    Route::resource('blog', BlogAdminController::class);

    Route::get('service/delete/{id}', [ServiceAdminController::class,'delete'])->name('admin.service.delete');
    Route::get('blog/delete/{id}', [BlogAdminController::class,'delete'])->name('admin.blog.delete');
    Route::post('/logout', [AdminLoginController::class,'logout'])->name('admin.logout');

});
