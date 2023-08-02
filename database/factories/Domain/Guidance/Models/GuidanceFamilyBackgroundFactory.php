<?php

namespace Database\Factories\Domain\Guidance\Models;

use App\Domain\Admission\Enums\FamilyType;
use App\Domain\Admission\Enums\HighestEducationEnum;
use App\Domain\Guidance\Models\GuidanceFamilyBackground;
use App\Domain\Guidance\Models\GuidanceProfile;
use Domain\Admission\Enums\CivilStatusEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuidanceFamilyBackgroundFactory extends Factory
{
    protected $model = GuidanceFamilyBackground::class;

    public function definition(): array
    {
        return [
            'guidance_profile_id' => fake()->randomElement(GuidanceProfile::pluck('id')),
            'type' => fake()->randomElement(FamilyType::toValues()),
            'last_name' => fake()->lastName(),
            'first_name' => fake()->firstName(),
            'middle_name' => fake()->lastName(),
            'age' => 25,
            'religion' => fake()->randomElement(religions()),
            'nationality' => fake()->randomElement(citizenship()),
            'highest_educational_attainment' => fake()->randomElement(HighestEducationEnum::toValues()),
            'occupation' => 'Engineer',
            'place_of_work' => fake()->address(),
            'work_address' => fake()->address(),
            'home_address' => fake()->address(),
            'contact_number' => '09509342323',
            'marital_status' => fake()->randomElement(CivilStatusEnum::toValues()),
            'family_monthly_income' => 100000,
        ];
    }
}