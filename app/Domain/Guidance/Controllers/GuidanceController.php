<?php

namespace App\Domain\Guidance\Controllers;

use App\Domain\AcademicYear\Services\AcademicYearService;
use App\Http\Controllers\Controller;
use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Illuminate\View\View;

class GuidanceController extends Controller
{
    public function __construct(
        private readonly AcademicYearService $academicYearService,
    ) {
    }

    public function index(): View
    {
        $active = $this->academicYearService->active(
            AcademicYearStatus::enabled(),
            ModuleType::guidance()
        );

        return view('users.student.guidance.guidance_history', compact('active'));
    }
}
