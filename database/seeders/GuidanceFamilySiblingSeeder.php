<?php

namespace Database\Seeders;

use App\Domain\Guidance\Models\GuidanceFamilySibling;
use Illuminate\Database\Seeder;

class GuidanceFamilySiblingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GuidanceFamilySibling::factory(30)->create();
    }
}
