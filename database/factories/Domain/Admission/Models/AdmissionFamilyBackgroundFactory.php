<?php

namespace Database\Factories\Domain\Admission\Models;

use App\Domain\Admission\Enums\FamilyType;
use App\Domain\Admission\Enums\HighestEducationEnum;
use App\Domain\Admission\Models\AdmissionFamilyBackground;
use App\Domain\Level\Models\Level;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionFamilyBackgroundFactory extends Factory
{
    protected $model = AdmissionFamilyBackground::class;

    public function definition(): array
    {
        return [
            'admission_personal_profile_id' => $this->faker->randomElement(AdmissionPersonalProfile::pluck('id')),
            'last_name' => $this->faker->lastName(),
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'address' => $this->faker->address(),
            'email_address' => $this->faker->safeEmail(),
            'mobile_number' => $this->faker->phoneNumber(),
            'occupation' => 'Software Engineer',
            'monthly_income' => 90000,
            'company' => $this->faker->company(),
            'company_address' => $this->faker->address(),
            'type' => $this->faker->randomElement(FamilyType::toValues()),
            'highest_educational_attainment' => $this->faker->randomElement(HighestEducationEnum::toValues()),
        ];
    }
}