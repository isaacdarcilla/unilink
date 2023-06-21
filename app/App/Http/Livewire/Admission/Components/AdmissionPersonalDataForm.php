<?php

namespace App\Http\Livewire\Admission\Components;

use App\Admin\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AdmissionPersonalDataForm extends Component
{
    public ?User $user;

    public string $first_name, $middle_name, $last_name, $sex, $gender_preference;

    public ?string $region_code, $temporary_region_code;

    public ?string $province_code, $temporary_province_code;

    public ?string $city_code, $temporary_city_code;

    public ?string $barangay_code, $temporary_barangay_code;

    public ?string $street, $temporary_street;

    public ?string $zip_code, $temporary_zip_code;

    public bool $same_address = false;

    public ?string $phone_number, $landline_number, $email_address, $facebook_account, $citizenship, $civil_status, $religion, $rank_in_family, $number_of_siblings, $ages_of_siblings;

    public array $special_skills = [];

    public function render(): View
    {
        return view('livewire.admission.components.admission-personal-data-form');
    }
}
