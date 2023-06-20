<?php

declare(strict_types=1);

use Domain\Admission\Controllers\AdmissionController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

Route::redirect('/', 'login');

Route::middleware([
    'web',
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    Route::controller(AdmissionController::class)->prefix('admission')->group(function () {
        Route::get('/', 'index')->name('admission.index');
        Route::get('/personal_data/{user?}', 'personal_data')->name('admission.personal_data');
    });
});
