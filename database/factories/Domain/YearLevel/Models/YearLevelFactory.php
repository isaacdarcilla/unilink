<?php

namespace Database\Factories\Domain\YearLevel\Models;

use App\Domain\College\Models\College;
use App\Domain\YearLevel\Models\YearLevel;
use Illuminate\Database\Eloquent\Factories\Factory;

class YearLevelFactory extends Factory
{
    protected $model = YearLevel::class;

    public function definition(): array
    {
        return [
            'college_id' => $this->faker->randomElement(College::pluck('id')),
            'name' => $this->faker->randomElement(
                ['First Year', 'Second Year', 'Third Year', ' Fourth Year', 'Fifth Year']
            ),
            'short' => '1st',
            'status' => 1,
        ];
    }
}