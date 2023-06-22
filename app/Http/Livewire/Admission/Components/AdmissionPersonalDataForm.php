<?php

namespace App\Http\Livewire\Admission\Components;

use App\Admin\Models\User;
use Illuminate\Contracts\View\View;
use Livewire\Component;

class AdmissionPersonalDataForm extends Component
{
    public ?User $user;

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

    public function render(): View
    {
        return view('livewire.admission.components.admission-personal-data-form');
    }
}
