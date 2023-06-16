<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new RoleSeeder();
        $users = User::factory(10)->create();

        $users->each(function (User $user) use ($role) {
            $user->assignRole(Arr::random($role->roles));
        });
    }
}
