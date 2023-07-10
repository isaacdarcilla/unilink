<?php

namespace App\Http\Livewire\Admission\Components;

use App\Admin\Models\User;
use App\Domain\Admission\Dto\CreateHealthDto;
use App\Domain\Admission\Enums\AdmissionApplicationProgress;
use App\Domain\Admission\Enums\AdmissionApplicationStatus;
use App\Domain\Admission\Requests\AdmissionHealthDataRequest;
use App\Domain\Admission\Services\AdmissionService;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Exception;
use Illuminate\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class AdmissionHealthForm extends Component
{
    use Actions;

    public ?User $user;

    protected array $rules;

    public string $height;

    public string $weight;

    public string $facial_marks;

    public string $physical_condition;

    public string $emergency_contact;

    public string $relationship;

    public string $emergency_contact_address;

    public string $emergency_contact_number;

    public bool $disableInputs = false;

    public AdmissionPersonalProfile $admissionPersonalProfile;

    public function boot(): void
    {
        $requests = new AdmissionHealthDataRequest();

        $this->rules = $requests->rules();
    }

    public function mount(): void
    {
        $health = $this->admissionPersonalProfile?->admission_physical_health;

        if ($health) {
            $this->disableInputs = disable_admission_inputs(
                AdmissionApplicationStatus::from(
                    $this->admissionPersonalProfile?->application_status
                )->value
            );

            $this->fill(
                $health->attributesToArray()
            );
        }
    }

    public function render(): View
    {
        return view('livewire.admission.components.admission-health-form');
    }

    public function submit(): void
    {
        $admissionService = new AdmissionService();

        $validated = $this->validate(
            $this->rules
        );

        try {
            $health = $admissionService->storeHealth(
                CreateHealthDto::fromArray($validated),
                $this->admissionPersonalProfile->id
            );

            if ($health) {
                $admissionService->updateProgress(
                    AdmissionApplicationProgress::completed(),
                    $this->admissionPersonalProfile
                );
            }

            $this->notification()->success(
                'Health background saved',
                'Your health form was successfully saved'
            );

            $this->redirect(
                route(
                    'admission.completed',
                    ['admission_personal_profile' => $this->admissionPersonalProfile->id]
                )
            );
        } catch (Exception $exception) {
            $this->notification()->error(
                'An error occurred',
                str($exception->getMessage())->limit()
            );
        }
    }
}
