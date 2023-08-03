<?php

namespace Database\Seeders;

use App\Domain\Guidance\Models\GuidanceHealthBackground;
use Illuminate\Database\Seeder;

class GuidanceHealthBackgroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuidanceHealthBackground::factory(20)->create();
    }
}
