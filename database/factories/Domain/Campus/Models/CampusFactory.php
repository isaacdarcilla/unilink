<?php

namespace Database\Factories\Domain\Campus\Models;

use Domain\Campus\Enums\CampusStatus;
use Domain\Campus\Models\Campus;
use Illuminate\Database\Eloquent\Factories\Factory;

class CampusFactory extends Factory
{
    protected $model = Campus::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->company(),
            'description' => $this->faker->sentence(),
            'address' => $this->faker->address(),
            'status' => $this->faker->randomElement(CampusStatus::toValues()),
        ];
    }
}
