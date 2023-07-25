<?php

namespace Database\Seeders;

use App\Domain\YearLevel\Models\YearLevel;
use Illuminate\Database\Seeder;

class YearLevelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        YearLevel::factory(30)->create();
    }
}
