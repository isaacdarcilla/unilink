<?php

namespace Database\Factories\Domain\Guidance\Models;

use App\Domain\Guidance\Models\GuidanceHealthBackground;
use App\Domain\Guidance\Models\GuidanceProfile;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuidanceHealthBackgroundFactory extends Factory
{
    protected $model = GuidanceHealthBackground::class;

    public function definition(): array
    {
        return [
            'guidance_profile_id' => fake()->randomElement(GuidanceProfile::pluck('id')),
            'question_key' => fake()->randomElement(array_keys(guidance_health_questions())),
            'answer' => fake()->sentence(),
        ];
    }
}