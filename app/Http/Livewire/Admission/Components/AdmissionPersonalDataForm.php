<?php

namespace App\Http\Livewire\Admission\Components;

use App\Admin\Models\User;
use App\Domain\AcademicYear\Services\AcademicYearService;
use App\Domain\Admission\Dto\CreateAdmissionProfileDto;
use App\Domain\Admission\Enums\AdmissionApplicationStatus;
use App\Domain\Admission\Requests\AdmissionPersonalDataRequest;
use App\Domain\Admission\Services\AdmissionService;
use App\Domain\Campus\Services\CampusService;
use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Domain\AcademicYear\Models\AcademicYear;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Domain\Campus\Enums\CampusStatus;
use Domain\Program\Enums\ProgramStatus;
use Domain\Program\Services\ProgramService;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use WireUi\Traits\Actions;

class AdmissionPersonalDataForm extends Component
{
    use Actions;

    public ?User $user;

    public Collection $programs;

    public Collection $campuses;

    public ?AcademicYear $academic_year;

    public ?string $first_name;

    public ?string $middle_name;

    public ?string $last_name;

    public ?string $sex_at_birth;

    public ?string $gender_preference;

    public ?string $region;

    public ?string $temporary_region;

    public ?string $province;

    public ?string $temporary_province;

    public ?string $municipality;

    public ?string $temporary_municipality;

    public ?string $barangay;

    public ?string $temporary_barangay;

    public ?string $street;

    public ?string $temporary_street;

    public ?string $zip_code;

    public ?string $temporary_zip_code;

    public ?string $scholarship_grantee;

    public ?string $date_of_birth;

    public ?string $place_of_birth;

    public ?string $lrn;

    public bool $same_address = false;

    public ?string $mobile_number;

    public ?string $landline_number;

    public ?string $email_address;

    public ?string $facebook_account;

    public ?string $citizenship;

    public ?string $civil_status;

    public ?string $religion;

    public ?string $rank_in_family;

    public ?string $number_of_siblings;

    public ?string $mean_ages_of_siblings;

    public array $special_skills = [];

    public array $favorite_sports = [];

    public ?string $program_first_choice;

    public ?string $program_second_choice;

    public ?string $program_third_choice;

    public array $gadget = [];

    public ?string $internet_status;

    public string|int|null $campus;

    public bool $view;

    public AdmissionPersonalProfile $admissionPersonalProfile;

    public bool $disableInputs = false;

    public function mount(): void
    {
        $programService = new ProgramService();
        $campusService = new CampusService();
        $academicService = new AcademicYearService();

        $this->programs = $programService->all(ProgramStatus::enabled());
        $this->campuses = $campusService->all(CampusStatus::enabled());
        $this->academic_year = $academicService->active(
            AcademicYearStatus::enabled(),
            ModuleType::admission()
        );

        $this->view = request()->has('view');

        if ($this->admissionPersonalProfile->application_status) {
            $fill = [
                'campus' => (int)$this->admissionPersonalProfile->campus_id,
                'internet_status' => $this->admissionPersonalProfile->internet_status,
            ];

            $this->disableInputs = disable_admission_inputs(
                AdmissionApplicationStatus::from(
                    $this->admissionPersonalProfile?->application_status
                )->value
            );

            rescue(function () use ($fill) {
                $this->fill(
                    array_merge(
                        $fill,
                        $this->admissionPersonalProfile
                            ->attributesToArray()
                    )
                );
            });
        }
    }

    public function render(): View
    {
        $admissionService = new AdmissionService();

        $applications = $admissionService->getAdmissions(
            academicYearId: $this->academic_year->id
        );

        return view('livewire.admission.components.admission-personal-data-form', compact('applications'));
    }

    public function submit(): void
    {
        $request = new AdmissionPersonalDataRequest();
        $admissionService = new AdmissionService();

        $validated = $this->validate(
            $request->rules($this->same_address)
        );

        try {
            $profile = $admissionService->storeProfile(
                CreateAdmissionProfileDto::fromArray($validated),
                $this->academic_year->id,
                $this->same_address,
                $this->view
            );

            if ($profile) {
                $this->notification()->success(
                    'Profile saved',
                    'Your profile was successfully saved'
                );

                $this->redirect(
                    route(
                        'admission.education',
                        ['admission_personal_profile' => $profile->id]
                    )
                );
            }
        } catch (Exception $exception) {
            Log::debug($exception);
            $this->notification()->error(
                'An error occurred',
                'Your profile was not saved: '.str($exception->getMessage())->limit(0)
            );
        }
    }
}
