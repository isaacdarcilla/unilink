<?php

namespace Database\Factories\Domain\Guidance\Models;

use App\Domain\Guidance\Models\GuidanceProfile;
use App\Domain\Guidance\Models\GuidanceSocialQuestion;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuidanceSocialQuestionFactory extends Factory
{
    protected $model = GuidanceSocialQuestion::class;

    public function definition(): array
    {
        return [
            'guidance_profile_id' => fake()->randomElement(GuidanceProfile::pluck('id')),
            'question_key' => fake()->randomElement(array_keys(guidance_questions())),
            'answer' => fake()->sentence(),
        ];
    }
}