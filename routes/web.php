<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Auth\LoginController;
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
//     return view('welcome');
// });



Route::middleware(['customAuth'])->group(function () {
Route::get('/',[IndexController::class,'index']);
Route::post('/logout',[LoginController::class,'logout'])->name('logout');
});


Route::middleware(['guest'])->group(function () {
Route::get('/login',[LoginController::class,'showLogin'])->name('login');
Route::get('/otp-verification',[LoginController::class,'verfyOtpPage'])->name('verfyOtpPage');
Route::post('/otp-verification',[LoginController::class,'verfyOtp'])->name('verfyOtp');
Route::post('/resend-otp',[LoginController::class,'resendOtp'])->name('resendOtp');
Route::post('/login',[LoginController::class,'login']);
});

Route::fallback(function () {
    return view('404_page',['error_code' => 404]);
  });