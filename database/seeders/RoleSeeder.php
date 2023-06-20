<?php

namespace Database\Seeders;

use App\Admin\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect(RoleEnum::toValues())->each(function ($role) {
            Role::create([
                'name' => $role,
            ]);
        });
    }
}
