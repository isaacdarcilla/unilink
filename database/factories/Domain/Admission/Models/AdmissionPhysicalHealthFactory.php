<?php

namespace Database\Factories\Domain\Admission\Models;

use App\Domain\Admission\Enums\FamilyType;
use App\Domain\Admission\Models\AdmissionPhysicalHealth;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionPhysicalHealthFactory extends Factory
{
    protected $model = AdmissionPhysicalHealth::class;

    public function definition(): array
    {
        return [
            'admission_personal_profile_id' => $this->faker->randomElement(AdmissionPersonalProfile::pluck('id')),
            'height' => 176,
            'weight' => 65,
            'facial_marks' => 'None',
            'physical_condition' => 'None',
            'emergency_contact' => $this->faker->name(),
            'relationship' => $this->faker->randomElement(FamilyType::toValues()),
            'emergency_contact_address' => $this->faker->address(),
            'emergency_contact_number' => $this->faker->phoneNumber()
        ];
    }
}
