<?php

namespace App\Http\Livewire\Admission\Components;

use App\Admin\Models\User;
use Domain\Program\Enums\ProgramStatus;
use Domain\Program\Services\ProgramService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class AdmissionPersonalDataForm extends Component
{
    public ?User $user;

    public Collection $programs;

    public ?string $first_name;

    public ?string $middle_name;

    public ?string $last_name;

    public ?string $sex;

    public ?string $gender_preference;

    public ?string $region_code;

    public ?string $temporary_region_code;

    public ?string $province_code;

    public ?string $temporary_province_code;

    public ?string $city_code;

    public ?string $temporary_city_code;

    public ?string $barangay_code;

    public ?string $temporary_barangay_code;

    public ?string $street;

    public ?string $temporary_street;

    public ?string $zip_code;

    public ?string $temporary_zip_code;

    public ?string $scholarship_grantee;

    public ?string $date_of_birth;

    public ?string $place_of_birth;

    public ?string $lrn;

    public bool $same_address = false;

    public ?string $phone_number;

    public ?string $landline_number;

    public ?string $email_address;

    public ?string $facebook_account;

    public ?string $citizenship;

    public ?string $civil_status;

    public ?string $religion;

    public ?string $rank_in_family;

    public ?string $number_of_siblings;

    public ?string $ages_of_siblings;

    public array $special_skills = [];

    public array $favorite_sports = [];

    public ?string $program_first_choice;

    public ?string $program_second_choice;

    public ?string $program_third_choice;

    public function mount(): void
    {
        $programService = new ProgramService();

        $this->programs = $programService->all(ProgramStatus::enabled());
    }

    public function render(): View
    {
        return view('livewire.admission.components.admission-personal-data-form');
    }
}
