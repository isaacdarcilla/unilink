<?php

namespace Database\Factories\Domain\Admission\Models;

use App\Domain\Admission\Models\AdmissionEducation;
use App\Domain\Level\Models\Level;
use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionEducationFactory extends Factory
{
    protected $model = AdmissionEducation::class;

    public function definition(): array
    {
        return [
            'admission_personal_profile_id' => $this->faker->randomElement(AdmissionPersonalProfile::pluck('id')),
            'level_id' => $this->faker->randomElement(Level::pluck('id')),
            'school' => $this->faker->company(),
            'degree' => $this->faker->word(),
            'inclusive_dates_from' => $this->faker->date(),
            'inclusive_dates_to' => $this->faker->date(),
            'honors' => $this->faker->word(),
        ];
    }
}
