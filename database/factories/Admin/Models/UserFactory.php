<?php

namespace Database\Factories\Admin\Models;

use App\Admin\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'last_name' => $this->faker->lastName(),
            'prefix_name' => $this->faker->randomElement(['Mr.', 'Mrs.', 'Ms.', null]),
            'suffix_name' => $this->faker->randomElement(['Jr.', 'Sr.', null]),
            'phone_number' => $this->faker->phoneNumber(),
            'phone_number_verified_at' => now(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'two_factor_secret' => null,
            'two_factor_recovery_codes' => null,
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'profile_photo_path' => null,
        ];
    }

    public function unverified(): static
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
