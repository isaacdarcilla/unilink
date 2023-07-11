<?php

namespace Database\Factories\Domain\Admission\Models;

use App\Domain\Admission\Enums\QuestionnaireType;
use App\Domain\Admission\Models\AdmissionQuestionnaire;
use Illuminate\Database\Eloquent\Factories\Factory;

class AdmissionQuestionnaireFactory extends Factory
{
    protected $model = AdmissionQuestionnaire::class;

    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(QuestionnaireType::toValues()),
            'questionnaire' => $this->faker->sentence(),
            'questionnaire_description' => $this->faker->sentence(),
            'choices' => [
                'choices' => [
                    'Choice 1',
                    'Choice 2',
                ],
                'answer' => 0,
            ],
            'points' => 1,
        ];
    }
}
