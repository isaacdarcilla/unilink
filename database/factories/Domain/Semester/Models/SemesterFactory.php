<?php

namespace Database\Factories\Domain\Semester\Models;

use App\Domain\Semester\Models\Semester;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

class SemesterFactory extends Factory
{
    protected $model = Semester::class;

    public function definition(): array
    {
        return [
            'academic_year_id' => $this->faker->randomElement(AcademicYear::pluck('id')),
            'name' => $this->faker->name(),
            'short_name' => $this->faker->randomLetter(),
            'status' => 1,
        ];
    }
}