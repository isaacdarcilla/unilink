<?php

namespace App\Http\Livewire\Admission\Components;

use App\Admin\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AdmissionPersonalDataForm extends Component
{
    public ?User $user;

    public string $first_name;

    public ?string $region_code;

    public ?string $province_code;

    public function render(): View
    {
        return view('livewire.admission.components.admission-personal-data-form');
    }
}
