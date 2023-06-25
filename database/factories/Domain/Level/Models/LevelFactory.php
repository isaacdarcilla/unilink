<?php

namespace Database\Factories\Domain\Level\Models;

use App\Domain\Level\Models\Level;
use Illuminate\Database\Eloquent\Factories\Factory;

class LevelFactory extends Factory
{
    protected $model = Level::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->randomElement(['Elementary', 'Junior High School', 'Senior High School', 'College']
            ),
        ];
    }
}
