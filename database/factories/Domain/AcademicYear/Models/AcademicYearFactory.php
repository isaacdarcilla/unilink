<?php

namespace Database\Factories\Domain\AcademicYear\Models;

use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

class AcademicYearFactory extends Factory
{
    protected $model = AcademicYear::class;

    public function definition(): array
    {
        return [
            'academic_year_start' => $this->faker->year(),
            'academic_year_end' => $this->faker->year(),
            'description' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(AcademicYearStatus::toValues()),
            'module_type' => $this->faker->randomElement(ModuleType::toValues()),
        ];
    }
}
