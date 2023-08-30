<?php

namespace App\Livewire\Admission\Components;

use App\Admin\Models\User;
use App\Domain\Admission\Dto\CreateAdmissionEducationDto;
use App\Domain\Admission\Enums\AdmissionApplicationProgress;
use App\Domain\Admission\Enums\AdmissionApplicationStatus;
use App\Domain\Admission\Requests\AdmissionEducationDataRequest;
use App\Domain\Admission\Services\AdmissionService;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class AdmissionEducationForm extends Component
{
    use Actions;

    public ?User $user;

    public Collection $levels;

    protected array $rules;

    protected array $messages;

    public AdmissionPersonalProfile $admissionPersonalProfile;

    public Collection $inputs;

    public ?string $school;

    public ?string $level;

    public ?string $degree;

    public ?string $inclusive_dates_from;

    public ?string $inclusive_dates_to;

    public ?string $honors;

    public bool $educationFilled = false;

    public bool $disableInputs = false;

    public function boot(): void
    {
        $requests = new AdmissionEducationDataRequest();

        $this->rules = $requests->rules();
        $this->messages = $requests->messages();
        $this->levels = get_levels();
    }

    public function mount(): void
    {
        $educations = collect($this->admissionPersonalProfile?->admission_educations);

        if ($educations->isNotEmpty()) {
            $this->educationFilled = true;

            $this->disableInputs = disable_admission_inputs(
                AdmissionApplicationStatus::from(
                    $this->admissionPersonalProfile?->application_status
                )->value
            );

            $this->fillEducationInput($educations);
        }

        if ($educations->isEmpty()) {
            $this->educationFilled = false;
            $this->fill([
                'inputs' => collect([['level' => '']]),
            ]);
        }
    }

    public function fillEducationInput(Collection $educations): void
    {
        $data = [];

        $educations?->each(function ($column) use (&$data) {
            $item = [];
            foreach ($column->toArray() as $property => $value) {
                $item[$property == 'level_id' ? 'level' : $property] = $value;
            }
            $data[] = $item;
        });

        $this->fill([
            'inputs' => collect($data),
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

        try {
            collect($inputs)->each(function ($item) use (&$admissionService) {
                $admissionService->storeEducation(
                    CreateAdmissionEducationDto::fromArray($item),
                    $this->admissionPersonalProfile->id
                );
            });

            $admissionService->updateProgress(
                AdmissionApplicationProgress::family(),
                $this->admissionPersonalProfile
            );

            $this->notification()->success(
                'Education saved',
                'Your education background was successfully saved'
            );

            $this->redirect(
                route(
                    'admission.family',
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

    public function addInput(): void
    {
        $this->inputs->push(['level' => '']);
    }

    public function removeInput($key, $educationId = null): void
    {
        if ($educationId) {
            $this->dialog()->confirm([
                'title' => 'Are you sure?',
                'description' => 'Delete this education?',
                'acceptLabel' => 'Yes, delete it',
                'method' => 'deleteEducation',
                'params' => $educationId,
            ]);
        }

        if (!$educationId) {
            $this->inputs->pull($key);
        }
    }

    public function deleteEducation($educationId): void
    {
        $admissionService = new AdmissionService();
        $admissionService->deleteEducation($educationId);

        $this->redirect(
            route(
                'admission.education',
                ['admission_personal_profile' => $this->admissionPersonalProfile->id]
            )
        );
    }
}
