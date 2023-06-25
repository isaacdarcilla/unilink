<?php

namespace App\Http\Livewire\Admission\Components;

use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\View\View;
use Livewire\Component;

class AdmissionFamilyForm extends Component
{
    public AdmissionPersonalProfile $admissionPersonalProfile;

    public function boot(): void
    {
    }

    public function render(): View
    {
        return view('livewire.admission.components.admission-family-form');
    }
}
