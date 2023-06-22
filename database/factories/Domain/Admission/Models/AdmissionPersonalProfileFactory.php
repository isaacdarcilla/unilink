<?php

namespace Database\Factories\Domain\Admission\Models;

use App\Admin\Models\User;
use Domain\AcademicYear\Enums\ModuleType;
use Domain\AcademicYear\Models\AcademicYear;
use Domain\Admission\Enums\CivilStatusEnum;
use Domain\Admission\Enums\GadgetEnum;
use Domain\Admission\Enums\GenderPreferenceEnum;
use Domain\Admission\Enums\InternetStatus;
use Domain\Admission\Enums\ScholarshipGranteeEnum;
use Domain\Admission\Enums\SexEnum;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Domain\Campus\Models\Campus;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionPersonalProfileFactory extends Factory
{
    protected $model = AdmissionPersonalProfile::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'academic_year_id' => $this->faker->randomElement(
                AcademicYear::where('module_type', ModuleType::admission()->value)->pluck('id')
            ),
            'campus_id' => $this->faker->randomElement(Campus::pluck('id')),
            'application_status' => null,
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'last_name' => $this->faker->lastName(),
            'prefix_name' => $this->faker->title(),
            'suffix_name' => $this->faker->randomElement(['Jr.', 'Sr.', null]),
            'profile_photo' => null,
            'sex_at_birth' => $this->faker->randomElement(SexEnum::toValues()),
            'gender_preference' => $this->faker->randomElement(GenderPreferenceEnum::toValues()),
            'street' => $this->faker->streetName(),
            'barangay' => $this->faker->city(),
            'municipality' => $this->faker->city(),
            'province' => $this->faker->streetName(),
            'region' => $this->faker->country(),
            'temporary_street' => $this->faker->streetName(),
            'temporary_barangay' => $this->faker->address(),
            'temporary_municipality' => $this->faker->city(),
            'temporary_province' => $this->faker->streetName(),
            'temporary_region' => $this->faker->country(),
            'zip_code' => $this->faker->countryCode(),
            'mobile_number' => $this->faker->phoneNumber(),
            'landline_number' => $this->faker->phoneNumber(),
            'email_address' => $this->faker->safeEmail(),
            'facebook_account' => null,
            'date_of_birth' => now()->subYears(25),
            'place_of_birth' => $this->faker->address(),
            'citizenship' => $this->faker->randomElement(['Filipino', 'American', 'Chinese']),
            'gender' => $this->faker->randomElement(GenderPreferenceEnum::toValues()),
            'civil_status' => $this->faker->randomElement(CivilStatusEnum::toValues()),
            'religion' => $this->faker->randomElement(['Catholic', 'Islam']),
            'rank_in_family' => 1,
            'number_of_siblings' => 2,
            'mean_ages_of_siblings' => 1.4,
            'special_skills' => null,
            'favorite_sports' => null,
            'scholarship_grantee' => $this->faker->randomElement(ScholarshipGranteeEnum::toValues()),
            'lrn' => $this->faker->randomNumber(),
            'program_first_choice' => 'Computer Science',
            'program_second_choice' => 'Information Technology',
            'program_third_choice' => 'Information Systems',
            'gadget' => $this->faker->randomElement(GadgetEnum::toValues()),
            'internet_status' => $this->faker->randomElement(InternetStatus::toValues()),
        ];
    }
}