<?php

namespace App\Http\Livewire\Guidance\Components;

use App\Domain\AcademicYear\Services\AcademicYearService;
use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class GuidanceHistory extends Component
{
    use WithPagination;

    public ?string $filter;

    public AcademicYear $active;
    private readonly AcademicYearService $academicYearService;

    public function boot(): void
    {
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

        return view('livewire.guidance.components.guidance-history', compact('academicYears'));
    }
}
