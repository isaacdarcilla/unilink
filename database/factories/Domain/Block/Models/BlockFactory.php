<?php

namespace Database\Factories\Domain\Block\Models;

use App\Domain\Block\Models\Block;
use App\Domain\YearLevel\Models\YearLevel;
use Domain\Program\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlockFactory extends Factory
{
    protected $model = Block::class;

    public function definition(): array
    {
        return [
            'program_id' => $this->faker->randomElement(Program::pluck('id')),
            'year_level_id' => $this->faker->randomElement(YearLevel::pluck('id')),
            'name' => $this->faker->name(),
            'short_name' => $this->faker->randomLetter(),
            'status' => 1,
        ];
    }
}