<?php

namespace App\Livewire\Guidance\Components;

use App\Admin\Models\User;
use App\Domain\College\Services\CollegeService;
use App\Domain\Guidance\Models\GuidanceProfile;
use App\Domain\YearLevel\Services\YearLevelService;
use Domain\Program\Services\ProgramService;
use Illuminate\View\View;
use Livewire\Component;

class GuidanceProfileForm extends Component
{
    public ?User $user;

    public ?GuidanceProfile $guidanceProfile;

    public string $student_type;

    public string|int|null $program_id;

    public string|int|null $college_id;

    public function render(): View
    {
        $yearLevelService = new YearLevelService();
        $collegeService = new CollegeService();
        $programService = new ProgramService();

        $yearLevels = $yearLevelService->getYearLevelsByCollege(
            collegeId: $this->college_id ?? null
        );
        $colleges = $collegeService->getColleges();
        $programs = $programService->getByCollege($this->college_id ?? null);

        return view(
            'livewire.guidance.components.guidance-profile-form',
            compact('yearLevels', 'colleges', 'programs')
        );
    }
}
