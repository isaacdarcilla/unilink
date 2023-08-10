<?php

namespace App\Http\Livewire\Guidance\Components;

use App\Admin\Models\User;
use App\Domain\College\Services\CollegeService;
use App\Domain\Guidance\Models\GuidanceProfile;
use App\Domain\YearLevel\Services\YearLevelService;
use Illuminate\View\View;
use Livewire\Component;

class GuidanceProfileForm extends Component
{
    public ?User $user;

    public ?GuidanceProfile $guidanceProfile;

    public string $student_type;

    public string|int $college_id;

    public function render(): View
    {
        $yearLevelService = new YearLevelService();
        $collegeService = new CollegeService();

        $yearLevels = $yearLevelService->getYearLevelsByCollege(
            collegeId: $this->college_id ?? null
        );

        $colleges = $collegeService->getColleges();

        // TODO: Block should have college_id

        return view('livewire.guidance.components.guidance-profile-form', compact('yearLevels', 'colleges'));
    }
}
