<?php

namespace Database\Seeders;

use App\Domain\Admission\Models\AdmissionExaminationAnswer;
use Illuminate\Database\Seeder;

class AdmissionExaminationAnswerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdmissionExaminationAnswer::factory(30)->create();
    }
}
