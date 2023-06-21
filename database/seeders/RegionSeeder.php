<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!DB::table('regions')->count()) {
            DB::unprepared(file_get_contents(__DIR__.'/sql/philippine_regions.sql'));
        }
    }
}
