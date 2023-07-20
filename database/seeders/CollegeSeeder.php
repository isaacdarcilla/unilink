<?php

namespace Database\Seeders;

use App\Domain\College\Models\College;
use Illuminate\Database\Seeder;

class CollegeSeeder extends Seeder
{
    public function run(): void
    {
        College::factory(30)->create();
    }
}
