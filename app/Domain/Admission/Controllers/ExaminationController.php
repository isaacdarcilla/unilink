<?php

namespace App\Domain\Admission\Controllers;

use App\Domain\AcademicYear\Services\AcademicYearService;
use App\Domain\Admission\Models\AdmissionExamination;
use App\Domain\Admission\Services\ExaminationService;
use App\Http\Controllers\Controller;
use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ExaminationController extends Controller
{
    public function __construct(
        private readonly AcademicYearService $academicYearService,
        private readonly ExaminationService $examinationService,
    ) {
    }

    public function index(AdmissionExamination $admissionExamination): View|RedirectResponse
    {
        $active = $this->academicYearService->active(
            AcademicYearStatus::enabled(),
            ModuleType::admission()
        );

        abort_if($admissionExamination->user_id !== auth()->id(), 403);

        return view('users.student.examination.admission_examination', compact('active', 'admissionExamination'));
    }
}
