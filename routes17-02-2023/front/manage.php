<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Manage\InfrastructureController;
use App\Http\Controllers\Front\Manage\ManagefinanceController;
use App\Http\Controllers\Front\Manage\MiscellaneousController;
use App\Http\Controllers\Front\Manage\PendingdemandsController;

use App\Http\Controllers\Front\Manage\ProcurementController;
Route::middleware(['customAuth'])->prefix('infrastructure')->name('manage.infrastructure.')->group(function () {
Route::get('index/{temp_id}/{centerid?}',[InfrastructureController::class,'index'])->name('index');
Route::get('create',[InfrastructureController::class,'create'])->name('create');
Route::post('store',[InfrastructureController::class,'store'])->name('store');
Route::post('store_physical_form',[InfrastructureController::class,'store_physical_form'])->name('store_physical_form');
Route::post('store_financial_form',[InfrastructureController::class,'store_financial_form'])->name('store_financial_form');
Route::get('edit',[InfrastructureController::class,'edit'])->name('edit');
Route::get('getInfraDetailsById/{id}',[InfrastructureController::class,'getInfraDetailsById'])->name('getInfraDetailsById');
Route::get('infrWorkDeleteById/{id}',[InfrastructureController::class,'deleteById'])->name('infrWorkDeleteById');
Route::get('infrWorkForm2DeleteById/{id}',[InfrastructureController::class,'form2DeleteById'])->name('infrWorkForm2DeleteById');
Route::get('infrWorkForm3DeleteById/{id}',[InfrastructureController::class,'form3DeleteById'])->name('infrWorkForm3DeleteById');
});

//  Manage Finance Master Routes
Route::middleware(['customAuth'])->prefix('managefinance')->name('managefinance.')->group(function () {

    //Route::get('/', [ManagefinanceController::class, 'index'])->name('index');
    Route::get('/index/{temp_id}/{centerid?}', [ManagefinanceController::class, 'index'])->name('index');
    Route::post('/store', [ManagefinanceController::class, 'store'])->name('store');
    Route::get('edit/{id}', [ManagefinanceController::class, 'edit'])->name('edit');
    Route::POST('update', [ManagefinanceController::class, 'update'])->name('update');
    Route::POST('getbudgetcode', [ManagefinanceController::class, 'getbudgetcode'])->name('getbudgetcode');
    Route::get('financeDeleteById/{id}', [ManagefinanceController::class, 'DeleteById'])->name('financeDeleteById');
});


//PROCUREMENT routes
Route::middleware(['customAuth'])->prefix('procurement')->name('manage.procurement.')->group(function () {
    Route::get('index/{temp_id}/{centerid?}',[ProcurementController::class,'index'])->name('index');
    Route::post('store_form_first',[ProcurementController::class,'store_form_first'])->name('store_form_first');
    Route::post('store_form_second',[ProcurementController::class,'store_form_second'])->name('store_form_second');
    Route::post('store_form_third',[ProcurementController::class,'store_form_third'])->name('store_form_third');
    Route::post('store_form_fourth',[ProcurementController::class,'store_form_fourth'])->name('store_form_fourth');
    Route::post('store_form_fifth',[ProcurementController::class,'store_form_fifth'])->name('store_form_fifth');
    Route::get('procurementFormThirdDeleteById/{id}',[ProcurementController::class,'procurementFormThirdDeleteById'])->name('procurementFormThirdDeleteById');
    Route::get('procurementFormFourthDeleteById/{id}',[ProcurementController::class,'procurementFormFourthDeleteById'])->name('procurementFormFourthDeleteById');
    Route::get('procurementFormFifthDeleteById/{id}',[ProcurementController::class,'procurementFormFifthDeleteById'])->name('procurementFormFifthDeleteById');
    Route::get('getProcurementServiceDetailsById/{id}',[ProcurementController::class,'getProcurementServiceDetailsById'])->name('getProcurementServiceDetailsById');
    Route::POST('changesforthform', [ProcurementController::class, 'changesforthform'])->name('changesforthform');    
});

Route::fallback(function () {
    return view('404_page',['error_code' => 404]);
});

//  Manage Finance Master Routes
Route::middleware(['customAuth'])->prefix('miscellaneous')->name('manage.miscellaneous.')->group(function () {

    // Route::get('/', [MiscellaneousController::class, 'index'])->name('index');
    Route::get('/index/{temp_id}/{centerid?}', [MiscellaneousController::class, 'index'])->name('index');
    Route::post('/store', [MiscellaneousController::class, 'store'])->name('store');
    Route::post('/storeformtwo', [MiscellaneousController::class, 'storeformtwo'])->name('storeformtwo');
    Route::post('/storeformthree', [MiscellaneousController::class, 'storeformthree'])->name('storeformthree');
    Route::POST('getdatadetailcwpslp', [MiscellaneousController::class, 'getdatadetailcwpslp'])->name('getdatadetailcwpslp');
    Route::get('courtcasesdeleteById/{id}', [MiscellaneousController::class, 'courtcasesdeleteById'])->name('courtcasesdeleteById');
    Route::get('formtworowdeleteById/{id}', [MiscellaneousController::class, 'formtworowdeleteById'])->name('formtworowdeleteById');
    Route::get('retirementdeleteById/{id}', [MiscellaneousController::class, 'retirementdeleteById'])->name('retirementdeleteById');
});

// Manage Finance Master Routes
Route::middleware(['customAuth'])->prefix('pendingdemands')->name('pendingdemands.')->group(function () {

    // Route::get('/', [PendingdemandsController::class, 'index'])->name('index');
    Route::get('/index/{temp_id}/{centerid?}', [PendingdemandsController::class, 'index'])->name('index');
    Route::post('/store', [PendingdemandsController::class, 'store'])->name('store');
    Route::get('edit/{id}', [PendingdemandsController::class, 'edit'])->name('edit');
    Route::POST('update', [PendingdemandsController::class, 'update'])->name('update');
    // Route::POST('getbudgetcode', [PendingdemandsController::class, 'getbudgetcode'])->name('getbudgetcode');
    Route::get('pendingDeleteById/{id}', [PendingdemandsController::class, 'pendingDeleteById'])->name('pendingDeleteById');
});

