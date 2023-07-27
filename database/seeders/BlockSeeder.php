<?php

namespace Database\Seeders;

use App\Domain\Block\Models\Block;
use Illuminate\Database\Seeder;

class BlockSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Block::factory(100)->create();
    }
}
