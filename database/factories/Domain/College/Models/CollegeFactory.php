<?php

namespace Database\Factories\Domain\College\Models;

use App\Admin\Models\User;
use App\Domain\College\Models\College;
use Illuminate\Database\Eloquent\Factories\Factory;

class CollegeFactory extends Factory
{
    protected $model = College::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'name' => $this->faker->company(),
            'short_name' => $this->faker->word(),
            'status' => 'active',
        ];
    }
}