<?php

namespace App\Domain\Admission\Controllers;

use App\Domain\AcademicYear\Services\AcademicYearService;
use App\Domain\Admission\Models\AdmissionExamination;
use App\Http\Controllers\Controller;
use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Illuminate\View\View;

class ExaminationController extends Controller
{
    public function __construct(
        private readonly AcademicYearService $academicYearService,
    ) {
    }

    public function index(AdmissionExamination $admissionExamination): View
    {
        $active = $this->academicYearService->active(
            AcademicYearStatus::enabled(),
            ModuleType::admission()
        );

        return view('users.student.examination.admission_examination', compact('active', 'admissionExamination'));
    }
}
