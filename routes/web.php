<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\IndexController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Front\Manage\ReviewController;
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
Route::middleware(['customAuth'])->prefix('review')->name('review.')->group(function () {
  Route::get('/index', [ReviewController::class, 'index'])->name('index');
  Route::get('/part-one/step-one/{centerid?}', [ReviewController::class, 'partOneStepOne'])->name('partOneStepOne');
  Route::post('/part-one/step-one/store', [ReviewController::class, 'partOneStepOneStore'])->name('partOneStepOneStore');
  Route::get('/part-one/step-two/{centerid}', [ReviewController::class, 'partOneStepTwo'])->name('partOneStepTwo');
  Route::post('/part-one/step-two/store', [ReviewController::class, 'partOneStepTwoStore'])->name('partOneStepTwoStore');
  Route::get('/part-one/step-three/{centerid}', [ReviewController::class, 'partOneStepThree'])->name('partOneStepThree');
  Route::post('/part-one/step-three/store', [ReviewController::class, 'partOneStepThreeStore'])->name('partOneStepThreeStore');
  Route::get('/delete-data/{id}', [ReviewController::class, 'deleteDatabyId'])->name('delete-data');
  Route::get('/domicile/delete-data/{id}', [ReviewController::class, 'deleteDomicile']);
  Route::get('/ncoe-athletes/delete-data/{id}', [ReviewController::class, 'deleteNcoeAthletes']);
/////////shubham routes 
  Route::get('coachsupportstaffById/{id}', [ReviewController::class, 'coachsupportstaffById'])->name('coachsupportstaffById');
  Route::get('parttwoathletesById/{id}', [ReviewController::class, 'parttwoathletesById'])->name('parttwoathletesById');
  Route::get('twopartresidentialcoachesById/{id}', [ReviewController::class, 'twopartresidentialcoachesById'])->name('twopartresidentialcoachesById');
  Route::get('nutritionistchefById/{id}', [ReviewController::class, 'nutritionistchefById'])->name('nutritionistchefById');
  Route::get('sciencestaffdoctorById/{id}', [ReviewController::class, 'sciencestaffdoctorById'])->name('sciencestaffdoctorById');
  Route::get('play_field_ById/{id}', [ReviewController::class, 'play_field_ById'])->name('play_field_ById');
/////////shubham routes 
Route::get('/part-two/{centerid}', [ReviewController::class, 'partTwoform'])->name('part-two');
  Route::post('/part-two-store', [ReviewController::class, 'partTwoformStore'])->name('part-two-store');
  Route::post('/delete-data-form2/{id}', [ReviewController::class, 'DeleteDataFormTwo'])->name('delete-data-form2');
////Monu
 Route::get('/part-three/{centerid}', [ReviewController::class, 'partThreeform'])->name('part-three');
  Route::post('/part-three-store', [ReviewController::class, 'partThreeformStore'])->name('part-three-store');

});
Route::get('/delete-data-form2/{id}', [ReviewController::class, 'DeleteDataFormTwo'])->name('delete-data-form2');
/////////shubham routes 
///monu
//one three
Route::get('/deletedataform3/{id}',[ReviewController::class,'DeleteDatapartthree'])->name('deletedataform3');
//two
Route::get('/deletedataform3two/{id}',[ReviewController::class,'DeleteDatapartthreetwo'])->name('deletedataform3two');
//three
Route::get('/deletedataform3three/{id}',[ReviewController::class,'DeleteDatapartthreethree'])->name('deletedataform3three');
//four
Route::get('/deletedataform3four/{id}',[ReviewController::class,'DeleteDatapartthreefour'])->name('deletedataform3four');
Route::fallback(function () {
    return view('404_page',['error_code' => 404]);
  });