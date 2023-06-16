<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Student\StudentAdmissionController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('dashboard', 'index')->name('dashboard');
    });
    Route::controller(StudentAdmissionController::class)->prefix('admission')->group(function () {
        Route::get('/', 'index')->name('admission.index');
    });
});
