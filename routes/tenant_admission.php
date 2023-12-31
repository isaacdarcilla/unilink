<?php

declare(strict_types=1);

use App\Domain\Admission\Controllers\AdmissionController;
use App\Domain\Admission\Controllers\ExaminationController;
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
        Route::get('/personal_data/{admission_personal_profile?}/{user?}', 'personal_data')->name(
            'admission.personal_data'
        );
        Route::get('/education/{admission_personal_profile?}/{user?}', 'education')->name('admission.education');
        Route::get('/family/{admission_personal_profile?}/{user?}', 'family')->name('admission.family');
        Route::get('/health/{admission_personal_profile?}/{user?}', 'health')->name('admission.health');
        Route::get('/completed/{admission_personal_profile?}/{user?}', 'completed')->name('admission.completed');
    });

    Route::controller(ExaminationController::class)->prefix('admission/examination')->group(function () {
        Route::get('/{admission_examination}', 'index')->name('admission.examination.index');
    });
});
