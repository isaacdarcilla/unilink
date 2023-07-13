<?php

namespace Database\Factories\Domain\Admission\Models;

use App\Admin\Models\User;
use App\Domain\Admission\Models\AdmissionExamination;
use App\Domain\Admission\Models\AdmissionExaminationAnswer;
use App\Domain\Admission\Models\AdmissionQuestionnaire;
use Domain\AcademicYear\Enums\ModuleType;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionExaminationAnswerFactory extends Factory
{
    protected $model = AdmissionExaminationAnswer::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'academic_year_id' => $this->faker->randomElement(
                AcademicYear::where('module_type', ModuleType::admission()->value)->pluck('id')
            ),
            'admission_questionnaire_id' => $this->faker->randomElement(
                AdmissionQuestionnaire::pluck('id')
            ),
            'admission_examination_id' => $this->faker->randomElement(
                AdmissionExamination::pluck('id')
            ),
            'answer' => 0,
            'gathered_points' => 1,
            'is_correct' => true,
        ];
    }
}