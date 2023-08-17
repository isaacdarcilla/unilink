<?php

namespace Database\Factories\Domain\Guidance\Models;

use App\Admin\Models\User;
use App\Domain\Block\Models\Block;
use App\Domain\College\Models\College;
use App\Domain\Guidance\Enums\GuidanceApplicationProgress;
use App\Domain\Guidance\Enums\StudentType;
use App\Domain\Guidance\Models\GuidanceProfile;
use App\Domain\Semester\Models\Semester;
use App\Domain\YearLevel\Models\YearLevel;
use Domain\AcademicYear\Enums\ModuleType;
use Domain\AcademicYear\Models\AcademicYear;
use Domain\Admission\Enums\GenderPreferenceEnum;
use Domain\Campus\Models\Campus;
use Domain\Program\Models\Program;
use Illuminate\Database\Eloquent\Factories\Factory;

class GuidanceProfileFactory extends Factory
{
    protected $model = GuidanceProfile::class;

    public function definition(): array
    {
        return [
            'user_id' => $this->faker->randomElement(User::pluck('id')),
            'academic_year_id' => $this->faker->randomElement(
                AcademicYear::where('module_type', ModuleType::guidance()->value)->pluck('id')
            ),
            'program_id' => $this->faker->randomElement(Program::pluck('id')),
            'campus_id' => $this->faker->randomElement(Campus::pluck('id')),
            'college_id' => $this->faker->randomElement(College::pluck('id')),
            'year_level_id' => $this->faker->randomElement(YearLevel::pluck('id')),
            'block_id' => $this->faker->randomElement(Block::pluck('id')),
            'semester_id' => $this->faker->randomElement(Semester::pluck('id')),
            'application_status' => 1,
            'application_progress' => GuidanceApplicationProgress::personal_profile()->value,
            'student_type' => StudentType::new()->value,
            'first_name' => $this->faker->firstName(),
            'middle_name' => $this->faker->lastName(),
            'last_name' => $this->faker->lastName(),
            'prefix_name' => $this->faker->title(),
            'suffix_name' => $this->faker->randomElement(['Jr.', 'Sr.', null]),
            'profile_photo' => null,
            'gender' => $this->faker->randomElement(GenderPreferenceEnum::toValues()),
            'age' => 24,
            'religion' => $this->faker->randomElement(['Catholic', 'Islam']),
            'date_of_birth' => now()->subYears(25),
            'place_of_birth' => $this->faker->address(),

            'street' => $this->faker->streetName(),
            'barangay' => $this->faker->city(),
            'municipality' => $this->faker->city(),
            'province' => $this->faker->streetName(),
            'region' => $this->faker->country(),
            'zip_code' => $this->faker->countryCode(),

            'boarding_house_street' => $this->faker->streetName(),
            'boarding_house_barangay' => $this->faker->address(),
            'boarding_house_municipality' => $this->faker->city(),
            'boarding_house_province' => $this->faker->streetName(),
            'boarding_house_region' => $this->faker->country(),
            'boarding_house_zip_code' => '4800',

            'contact_number' => $this->faker->phoneNumber(),
            'nationality' => $this->faker->randomElement(['Filipino', 'American', 'Chinese']),
        ];
    }
}
