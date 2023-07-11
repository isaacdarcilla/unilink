<?php

namespace App\Http\Livewire\Admission\Components;

use App\Domain\Admission\Models\AdmissionExamination;
use Illuminate\View\View;
use Livewire\Component;

class AdmissionExaminationForm extends Component
{
    public AdmissionExamination $admissionExamination;

    public function render(): View
    {
        return view('livewire.admission.components.admission-examination-form');
    }
}
