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
            ProgramSeeder::class,
            LevelSeeder::class,
            AdmissionEducationSeeder::class,
            AdmissionFamilyBackgroundSeeder::class,
            AdmissionPhysicalHealthSeeder::class,
            AdmissionQuestionnaireSeeder::class,
            AdmissionExaminationSeeder::class,
            AdmissionExaminationAnswerSeeder::class,
            CollegeSeeder::class,
            YearLevelSeeder::class,
            BlockSeeder::class,
            SemesterSeeder::class,
            GuidanceProfileSeeder::class,
            GuidanceFamilyBackgroundSeeder::class,
            GuidanceFamilySiblingSeeder::class,
        ]);
    }
}
