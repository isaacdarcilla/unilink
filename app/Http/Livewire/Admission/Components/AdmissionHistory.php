<?php

namespace App\Http\Livewire\Admission\Components;

use App\Domain\AcademicYear\Services\AcademicYearService;
use App\Domain\Admission\Services\AdmissionService;
use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class AdmissionHistory extends Component
{
    use WithPagination;

    public ?string $filter;

    public AcademicYear $active;
    private readonly AcademicYearService $academicYearService;

    private readonly AdmissionService $admissionService;

    public function boot(): void
    {
        $this->admissionService = new AdmissionService();
        $this->academicYearService = new AcademicYearService();

        $this->active = $this->academicYearService->active(
            AcademicYearStatus::enabled(),
            ModuleType::admission()
        );

        $this->filter = $this->active->id;
    }

    public function render(): View
    {
        $academicYears = $this->academicYearService->all(
            ModuleType::admission()
        );

        $applications = $this->admissionService->getAdmissions(academicYearId: $this->filter);

        return view('livewire.admission.components.admission-history', compact('applications', 'academicYears'));
    }
}
