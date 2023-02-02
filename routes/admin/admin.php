<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\Template\ManageController;



Route::middleware(['customAuth'])->prefix('template-management')->name('temp.manage.')->group(function () {

    Route::get('/index', [ManageController::class, 'index'])->name('index');
    Route::get('/create', [ManageController::class, 'create'])->name('create')->middleware('ops');
    Route::get('edit/{id}', [ManageController::class, 'edit'])->name('edit')->middleware('ops');
    Route::POST('/update', [ManageController::class, 'update'])->name('update')->middleware('ops');
    Route::get('/regional-center-wise-templates/{rc_id}', [ManageController::class, 'rcWiseTemplate'])->name('rcWiseTemplate');
    Route::get('/template-wise-regional-center/{temp_id}', [ManageController::class, 'templateWiseRc'])->name('templateWiseRc');
    Route::get('/template-of-regional-center/{rc_id}/{temp_id}', [ManageController::class, 'perticularTemp'])->name('perticularTemp');
    Route::get('/template-of-regional-copy/{route_parameter}/{rc_id}/{center_id}', [ManageController::class, 'perticularTempCopy'])->name('perticularTempCopy');
    Route::get('/template-of-regional-center/{rc_id}/{temp_id}/{section}/{center_id}', [ManageController::class, 'viewForm'])->name('viewForm');
    Route::get('/template-of-regional-center-view/{rc_id}/{temp_id}/{section}/{center_id}', [ManageController::class, 'viewcenterForm'])->name('viewcenterForm');

    // Route::get('/regional-center-wise-templates', function () {
    //     return redirect()->route('temp.manage.index');
    // });
    // Route::get('/template-wise-regional-center', function () {
    //     return redirect()->route('temp.manage.index');
    // });
    // Route::get('/template-of-regional-center', function () {
    //     return redirect()->route('temp.manage.index');
    // });

    Route::POST('/store', [ManageController::class, 'store'])->name('store')->middleware('ops');

    Route::get('/deleteById/{id}', [ManageController::class, 'deleteById'])->name('deleteById')->middleware('ops');
});


Route::fallback(function () {
    return view('404_page', ['error_code' => 404]);
});
