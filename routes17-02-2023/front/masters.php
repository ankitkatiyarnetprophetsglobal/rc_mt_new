<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\Masters\InfrastructureController;
use App\Http\Controllers\Front\Masters\FinanceController;
use App\Http\Controllers\Front\Masters\MiscmasterController;
use App\Http\Controllers\Front\Masters\ProcurementController;

use App\Http\Controllers\Front\Masters\ProcurementServiceController;


//  Infrastructure Master Routes
Route::middleware(['customAuth'])->prefix('infrastructure')->name('infrastructure.')->group(function () {

    Route::get('/', [InfrastructureController::class, 'index'])->name('index');
    Route::get('create', [InfrastructureController::class, 'create'])->name('create');
    Route::post('store', [InfrastructureController::class, 'store'])->name('store');
    Route::get('edit/{id}', [InfrastructureController::class, 'edit'])->name('edit');
    Route::post('update', [InfrastructureController::class, 'update'])->name('update');
    Route::get('delete/{id}', [InfrastructureController::class, 'delete'])->name('delete');
});
//  Finance Master Routes
Route::middleware(['customAuth'])->prefix('finance')->name('finance.')->group(function () {

    // Route::get('/', [FinanceController::class, 'index'])->name('index');
    Route::get('/index', [FinanceController::class, 'index'])->name('index');
    Route::get('/create', [FinanceController::class, 'create'])->name('create');
    Route::POST('/store', [FinanceController::class, 'store'])->name('store');
    Route::get('edit/{id}', [FinanceController::class, 'edit'])->name('edit');
    Route::POST('update', [FinanceController::class, 'update'])->name('update');
    Route::get('delete/{id}', [FinanceController::class, 'delete'])->name('delete');
});

//  Finance Master Routes
Route::middleware(['customAuth'])->prefix('miscmaster')->name('masters.miscmaster.')->group(function () {

    Route::get('/', [MiscmasterController::class, 'index'])->name('index');
    Route::get('/index', [MiscmasterController::class, 'index'])->name('index');
    Route::get('/create', [MiscmasterController::class, 'create'])->name('create');
    Route::POST('/store', [MiscmasterController::class, 'store'])->name('store');
    Route::get('edit/{id}', [MiscmasterController::class, 'edit'])->name('edit');
    Route::POST('update', [MiscmasterController::class, 'update'])->name('update');
    Route::get('delete/{id}', [MiscmasterController::class, 'delete'])->name('delete');
//  Infrastructure Master Routes
});
Route::middleware(['customAuth'])->prefix('procurement')->name('procurement.')->group(function () {

    Route::get('/', [ProcurementController::class, 'index'])->name('index');
    Route::get('create', [ProcurementController::class, 'create'])->name('create');
    Route::post('store', [ProcurementController::class, 'store'])->name('store');
    Route::get('edit/{id}', [ProcurementController::class, 'edit'])->name('edit');
    Route::post('update', [ProcurementController::class, 'update'])->name('update');
    Route::get('delete/{id}', [ProcurementController::class, 'delete'])->name('delete');
});
Route::middleware(['customAuth'])->prefix('procurement/service')->name('procurement.service.')->group(function () {

    Route::get('/', [ProcurementServiceController::class, 'index'])->name('index');
    Route::get('create', [ProcurementServiceController::class, 'create'])->name('create');
    Route::post('store', [ProcurementServiceController::class, 'store'])->name('store');
    Route::get('edit/{id}', [ProcurementServiceController::class, 'edit'])->name('edit');
    Route::post('update', [ProcurementServiceController::class, 'update'])->name('update');
    Route::get('delete/{id}', [ProcurementServiceController::class, 'delete'])->name('delete');
});




Route::fallback(function () {
    return view('404_page',['error_code' => 404]);
  });


