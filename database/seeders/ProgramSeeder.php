<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (!DB::table('programs')->count()) {
            DB::unprepared(file_get_contents(__DIR__.'/sql/programs.sql'));
        }
    }
}
