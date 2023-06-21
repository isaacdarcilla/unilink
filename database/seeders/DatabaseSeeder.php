<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            CampusSeeder::class,
            AcademicYearSeeder::class,
            AdmissionPersonalProfileSeeder::class,
            RegionSeeder::class,
            ProvinceSeeder::class,
            CitySeeder::class,
            BarangaySeeder::class,
        ]);
    }
}
