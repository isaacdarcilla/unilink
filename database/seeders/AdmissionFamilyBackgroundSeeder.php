<?php

namespace Database\Seeders;

use App\Domain\Admission\Models\AdmissionFamilyBackground;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmissionFamilyBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdmissionFamilyBackground::factory()->count(10)->create();
    }
}
