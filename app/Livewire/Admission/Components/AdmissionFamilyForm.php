<?php

namespace App\Livewire\Admission\Components;

use App\Admin\Models\User;
use App\Domain\Admission\Dto\CreateAdmissionFamilyDto;
use App\Domain\Admission\Enums\AdmissionApplicationProgress;
use App\Domain\Admission\Enums\AdmissionApplicationStatus;
use App\Domain\Admission\Requests\AdmissionFamilyDataRequest;
use App\Domain\Admission\Services\AdmissionService;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Illuminate\View\View;
use Livewire\Component;
use WireUi\Traits\Actions;

class AdmissionFamilyForm extends Component
{
    use Actions;

    public ?User $user;

    protected array $rules;

    protected array $messages;

    public ?string $type;

    public ?string $last_name;

    public ?string $middle_name;

    public ?string $first_name;

    public ?string $address;

    public ?string $email_address;

    public ?string $mobile_number;

    public ?string $highest_educational_attainment;

    public ?string $occupation;

    public ?string $monthly_income;

    public ?string $company;

    public ?string $company_address;

    public AdmissionPersonalProfile $admissionPersonalProfile;

    public Collection $inputs;

    public bool $familyFilled = false;

    public bool $disableInputs = false;

    public function boot(): void
    {
        $requests = new AdmissionFamilyDataRequest();

        $this->rules = $requests->rules();
        $this->messages = $requests->messages();
    }

    public function mount(): void
    {
        $families = collect($this->admissionPersonalProfile?->admission_family_backgrounds);

        if ($families->isNotEmpty()) {
            $this->familyFilled = true;

            $this->disableInputs = disable_admission_inputs(
                AdmissionApplicationStatus::from(
                    $this->admissionPersonalProfile?->application_status
                )->value
            );

            $this->fillFamilyInput($families);
        }

        if ($families->isEmpty()) {
            $this->familyFilled = false;
            $this->fill([
                'inputs' => collect([['type' => '']]),
            ]);
        }
    }

    public function fillFamilyInput(Collection $families): void
    {
        $data = [];

        $families?->each(function ($column) use (&$data) {
            $item = [];
            foreach ($column->toArray() as $property => $value) {
                $item[$property] = $value;
            }
            $data[] = $item;
        });

        $this->fill([
            'inputs' => collect($data),
        ]);
    }

    public function render(): View
    {
        return view('livewire.admission.components.admission-family-form');
    }

    public function submit(): void
    {
        $admissionService = new AdmissionService();

        ['inputs' => $inputs] = $this->validate();

        try {
            collect($inputs)->each(function ($item) use (&$admissionService) {
                $admissionService->storeFamily(
                    CreateAdmissionFamilyDto::fromArray($item),
                    $this->admissionPersonalProfile->id
                );
            });

            $admissionService->updateProgress(
                AdmissionApplicationProgress::health(),
                $this->admissionPersonalProfile
            );

            $this->notification()->success(
                'Family background saved',
                'Your family background was successfully saved'
            );

            $this->redirect(
                route(
                    'admission.health',
                    ['admission_personal_profile' => $this->admissionPersonalProfile->id]
                )
            );
        } catch (Exception $exception) {
            Log::debug($exception);
            $this->notification()->error(
                'An error occurred',
                str($exception->getMessage())->limit()
            );
        }
    }

    public function addInput(): void
    {
        $this->inputs->push(['type' => '']);
    }

    public function removeInput($key, $familyId = null): void
    {
        if ($familyId) {
            $this->dialog()->confirm([
                'title' => 'Are you sure?',
                'description' => 'Delete this background?',
                'acceptLabel' => 'Yes, delete it',
                'method' => 'deleteFamily',
                'params' => $familyId,
            ]);
        }

        if (!$familyId) {
            $this->inputs->pull($key);
        }
    }

    public function deleteFamily($familyId): void
    {
        $admissionService = new AdmissionService();
        $admissionService->deleteFamily($familyId);

        $this->redirect(
            route(
                'admission.family',
                ['admission_personal_profile' => $this->admissionPersonalProfile->id]
            )
        );
    }
}
