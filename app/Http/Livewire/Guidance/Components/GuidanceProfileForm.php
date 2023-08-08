<?php

namespace App\Http\Livewire\Guidance\Components;

use App\Admin\Models\User;
use App\Domain\Guidance\Models\GuidanceProfile;
use Illuminate\View\View;
use Livewire\Component;

class GuidanceProfileForm extends Component
{
    public ?User $user;

    public ?GuidanceProfile $guidanceProfile;

    public function render(): View
    {
        return view('livewire.guidance.components.guidance-profile-form');
    }
}
