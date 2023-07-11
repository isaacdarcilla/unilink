<?php

namespace Database\Factories\Domain\Admission\Models;

use App\Admin\Models\User;
use App\Domain\Admission\Models\AdmissionExamination;
use Domain\AcademicYear\Enums\ModuleType;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionExaminationFactory extends Factory
{
    protected $model = AdmissionExamination::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'academic_year_id' => $this->faker->randomElement(
                AcademicYear::where('module_type', ModuleType::admission()->value)->pluck('id')
            ),
            'total_points' => 10,
        ];
    }
}