<?php

namespace App\Domain\Guidance\Controllers;

use App\Admin\Models\User;
use App\Domain\AcademicYear\Services\AcademicYearService;
use App\Domain\Guidance\Models\GuidanceProfile;
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

    public function guidance_profile(?GuidanceProfile $guidanceProfile, ?User $user): View
    {
        if (!is_null($guidanceProfile->id)) {
            abort_if($guidanceProfile->user_id !== auth()->id(), 403);
        }

        return view('users.student.guidance.guidance_profile', compact('guidanceProfile', 'user'));
    }
}
