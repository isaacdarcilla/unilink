<?php

namespace Database\Factories\Domain\Guidance\Models;

use App\Domain\Guidance\Models\GuidanceFamilyBackground;
use App\Domain\Guidance\Models\GuidanceFamilySibling;
use Domain\Admission\Enums\CivilStatusEnum;
use Domain\Admission\Enums\SexEnum;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuidanceFamilySiblingFactory extends Factory
{
    protected $model = GuidanceFamilySibling::class;

    public function definition(): array
    {
        return [
            'guidance_family_background_id' => fake()->randomElement(GuidanceFamilyBackground::pluck('id')),
            'name' => fake()->name(),
            'age' => 25,
            'sex' => fake()->randomElement(SexEnum::toValues()),
            'civil_status' => fake()->randomElement(CivilStatusEnum::toValues()),
            'school_or_place_of_work' => fake()->address(),
            'year_level_or_occupation' => 'Engineer',
        ];
    }
}