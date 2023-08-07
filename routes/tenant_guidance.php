<?php

declare(strict_types=1);

use App\Domain\Guidance\Controllers\GuidanceController;
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
    Route::controller(GuidanceController::class)->prefix('guidance')->group(function () {
        Route::get('/', 'index')->name('guidance.index');
        Route::get('/personal_profile/{guidance_profile?}/{user?}', 'guidance_profile')->name(
            'guidance.guidance_profile'
        );
    });
});
