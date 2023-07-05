<?php

namespace Database\Seeders;

use App\Domain\Admission\Models\AdmissionPhysicalHealth;
use Illuminate\Database\Seeder;

class AdmissionPhysicalHealthSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdmissionPhysicalHealth::factory(20)->create();
    }
}
