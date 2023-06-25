<?php

namespace Database\Seeders;

use App\Domain\Level\Models\Level;
use Illuminate\Database\Seeder;

class LevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Level::factory()->count(4)->create();
    }
}
