<?php

namespace Database\Seeders;

use App\Admin\Enums\RoleEnum;
use App\Admin\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        $users->each(function (User $user) {
            $user->assignRole(Arr::random(RoleEnum::toValues()));
        });
    }
}
