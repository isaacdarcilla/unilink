<?php

namespace Database\Seeders;

use App\Domain\Admission\Models\AdmissionEducation;
use Illuminate\Database\Seeder;

class AdmissionEducationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdmissionEducation::factory()->count(10)->create();
    }
}
