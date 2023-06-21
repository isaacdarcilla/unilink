<?php

namespace Database\Seeders;

use Domain\Admission\Models\AdmissionPersonalProfile;
use Illuminate\Database\Seeder;

class AdmissionPersonalProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdmissionPersonalProfile::factory(10)->create();
    }
}
