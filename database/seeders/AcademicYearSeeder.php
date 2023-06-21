<?php

namespace Database\Seeders;

use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Database\Seeder;

class AcademicYearSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AcademicYear::factory(10)->create();
    }
}
