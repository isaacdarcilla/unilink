<?php

namespace Database\Seeders;

use App\Domain\Guidance\Models\GuidanceSocialQuestion;
use Illuminate\Database\Seeder;

class GuidanceSocialQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuidanceSocialQuestion::factory(50)->create();
    }
}
