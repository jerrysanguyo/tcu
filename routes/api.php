<?php

use App\Http\Controllers\Admission\AdmissionController;
use Illuminate\Support\Facades\Route;

Route::post('/admissions', [AdmissionController::class, 'store']);