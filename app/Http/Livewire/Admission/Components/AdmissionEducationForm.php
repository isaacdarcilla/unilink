<?php

namespace App\Http\Livewire\Admission\Components;

use App\Admin\Models\User;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\View\View;
use Livewire\Component;

class AdmissionEducationForm extends Component
{
    public ?User $user;

    public AdmissionPersonalProfile $admissionPersonalProfile;

    public function mount(): void
    {
    }

    public function render(): View
    {
        return view('livewire.admission.components.admission-education-form');
    }
}
