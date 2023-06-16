<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public array $roles = [
        'student',
        'super_admin',
        'admin',
    ];

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect($this->roles)->each(function ($role) {
            Role::create([
                'name' => $role,
            ]);
        });
    }
}
