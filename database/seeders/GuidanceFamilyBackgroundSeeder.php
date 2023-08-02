<?php

namespace Database\Seeders;

use App\Domain\Guidance\Models\GuidanceFamilyBackground;
use Illuminate\Database\Seeder;

class GuidanceFamilyBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuidanceFamilyBackground::factory(30)->create();
    }
}
