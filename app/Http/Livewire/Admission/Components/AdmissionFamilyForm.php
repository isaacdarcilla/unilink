<?php

namespace App\Http\Livewire\Admission\Components;

use App\Admin\Models\User;
use App\Domain\Admission\Dto\CreateAdmissionFamilyDto;
use App\Domain\Admission\Enums\AdmissionApplicationProgress;
use App\Domain\Admission\Requests\AdmissionFamilyDataRequest;
use App\Domain\Admission\Services\AdmissionService;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Exception;
use Illuminate\Support\Collection;
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

    public function boot(): void
    {
        $requests = new AdmissionFamilyDataRequest();

        $this->rules = $requests->rules();
        $this->messages = $requests->messages();
    }

    public function mount(): void
    {
        $this->fill([
            'inputs' => collect([['type' => '']]),
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

    public function removeInput($key): void
    {
        $this->inputs->pull($key);
    }
}
