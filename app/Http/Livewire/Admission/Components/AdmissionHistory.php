<?php

namespace App\Http\Livewire\Admission\Components;

use App\Domain\AcademicYear\Services\AcademicYearService;
use App\Domain\Admission\Services\AdmissionService;
use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Illuminate\View\View;
use Livewire\Component;

class AdmissionHistory extends Component
{
    private readonly AcademicYearService $academicYearService;

    private readonly AdmissionService $admissionService;

    public function mount(): void
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

        $applications = $this->admissionService->getAdmissions($active->id);

        return view('livewire.admission.components.admission-history', compact('active', 'applications'));
    }
}
