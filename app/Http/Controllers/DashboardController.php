<?php

namespace App\Http\Controllers;

use App\Admin\Enums\RoleEnum;
use App\Domain\AcademicYear\Services\AcademicYearService;
use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Illuminate\View\View;

class DashboardController extends Controller
{
    public function __construct(
        private readonly AcademicYearService $academicYearService
    ) {
    }

    public function index(): View
    {
        $role = role_is([
            RoleEnum::student()->value,
            RoleEnum::parents()->value,
        ]);

        $active = $this->academicYearService->active(
            AcademicYearStatus::enabled(),
            ModuleType::admission()
        );

        return view('dashboard', compact('role', 'active'));
    }
}
