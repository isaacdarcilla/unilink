<?php

namespace App\Http\Livewire\Admission\Components;

use App\Admin\Models\User;
use App\Domain\Admission\Dto\CreateAdmissionEducationDto;
use App\Domain\Admission\Requests\AdmissionEducationDataRequest;
use App\Domain\Admission\Services\AdmissionService;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;

class AdmissionEducationForm extends Component
{
    public ?User $user;

    protected array $rules;

    protected array $messages;

    public AdmissionPersonalProfile $admissionPersonalProfile;

    public Collection $inputs;

    public ?string $school_attended;

    public ?string $level;

    public ?string $degree_received;

    public ?string $inclusive_date_from;

    public ?string $inclusive_date_to;

    public ?string $honors_received;

    public function boot(): void
    {
        $requests = new AdmissionEducationDataRequest();

        $this->rules = $requests->rules();
        $this->messages = $requests->messages();

        $this->fill([
            'inputs' => collect([['level' => '']]),
        ]);
    }

    public function render(): View
    {
        return view('livewire.admission.components.admission-education-form');
    }

    public function submit(): void
    {
        $admissionService = new AdmissionService();

        ['inputs' => $inputs] = $this->validate();

        collect($inputs)->each(function ($item) use (&$admissionService) {
            $admissionService->storeEducation(
                CreateAdmissionEducationDto::fromArray($item),
                $this->admissionPersonalProfile->id
            );
        });
    }

    public function addInput(): void
    {
        $this->inputs->push(['level' => '']);
    }

    public function removeInput($key): void
    {
        $this->inputs->pull($key);
    }
}
