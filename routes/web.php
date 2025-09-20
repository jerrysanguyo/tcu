<?php

use App\Http\Controllers\Admission\AdmissionController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')
->group(function() {
    Route::get('/admission', [AdmissionController::class, 'index'])->name('admission.index');
    Route::get('admission/applicant-details/{uuid}', [AdmissionController::class, 'show'])->name('admission.show');
    Route::post('admission/store', [AdmissionController::class, 'store'])->name('admission.store');
});

Route::middleware('auth')
->group(function() {

    Route::middleware('role:superadmin')
    ->prefix('sa')
    ->name('superadmin')
    ->group(function() {

    });

});