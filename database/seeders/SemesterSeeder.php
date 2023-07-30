<?php

namespace Database\Seeders;

use App\Domain\Semester\Models\Semester;
use Illuminate\Database\Seeder;

class SemesterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Semester::factory(30)->create();
    }
}
