<?php

namespace Database\Seeders;

use App\Domain\Admission\Models\AdmissionExamination;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdmissionExaminationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdmissionExamination::factory(20)->create();
    }
}
