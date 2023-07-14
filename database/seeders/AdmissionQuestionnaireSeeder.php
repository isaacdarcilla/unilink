<?php

namespace Database\Seeders;

use App\Domain\Admission\Models\AdmissionQuestionnaire;
use Illuminate\Database\Seeder;

class AdmissionQuestionnaireSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdmissionQuestionnaire::factory(5)->create();
    }
}
