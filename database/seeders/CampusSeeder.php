<?php

namespace Database\Seeders;

use Domain\Campus\Models\Campus;
use Illuminate\Database\Seeder;

class CampusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Campus::factory(10)->create();
    }
}
