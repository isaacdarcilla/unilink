<?php

namespace App\Domain\Admission\Controllers;

use App\Admin\Models\User;
use App\Domain\AcademicYear\Services\AcademicYearService;
use App\Http\Controllers\Controller;
use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Illuminate\View\View;

class AdmissionController extends Controller
{
    public function __construct(
        private readonly AcademicYearService $academicYearService,
    ) {
    }

    public function index(): View
    {
        $active = $this->academicYearService->active(
            AcademicYearStatus::enabled(),
            ModuleType::admission()
        );

        return view('users.student.admission.admission_history', compact('active'));
    }

    public function personal_data(?User $user): View
    {
        return view('users.student.admission.admission_personal_data', compact('user'));
    }
}
