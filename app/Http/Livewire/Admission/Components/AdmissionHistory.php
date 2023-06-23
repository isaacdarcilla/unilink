<?php

namespace App\Http\Livewire\Admission\Components;

use App\Domain\AcademicYear\Services\AcademicYearService;
use App\Domain\Admission\Services\AdmissionService;
use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AdmissionHistory extends Component
{
    use WithPagination;

    private readonly AcademicYearService $academicYearService;

    private readonly AdmissionService $admissionService;

    public function boot(): void
    {
        $this->admissionService = new AdmissionService();
        $this->academicYearService = new AcademicYearService();
    }

    public function render(): View
    {
        $active = $this->academicYearService->active(
            AcademicYearStatus::enabled(),
            ModuleType::admission()
        );

        $applications = $this->admissionService->getAdmissions(academicYearId: $active->id);

        return view('livewire.admission.components.admission-history', compact('active', 'applications'));
    }
}
