<?php

namespace Database\Seeders;

use App\Domain\Guidance\Models\GuidanceProfile;
use Illuminate\Database\Seeder;

class GuidanceProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuidanceProfile::factory(30)->create();
    }
}
