<?php

namespace App\Domain\Admission\Services;

use App\Admin\Enums\RoleEnum;
use App\Domain\Admission\Dto\CreateAdmissionEducationDto;
use App\Domain\Admission\Dto\CreateAdmissionProfileDto;
use App\Domain\Admission\Enums\AdmissionApplicationProgress;
use App\Domain\Admission\Enums\AdmissionApplicationStatus;
use App\Domain\Admission\Models\AdmissionEducation;
use Domain\Admission\Models\AdmissionPersonalProfile;

class AdmissionService
{
    public function getAdmissions(
        int $academicYearId,
        string $column = 'created_at',
        string $direction = 'ASC',
        string|int $limit = 10
    ) {
        $role = role_is([
            RoleEnum::student()->value,
            RoleEnum::parents()->value,
        ]);

        return AdmissionPersonalProfile::when($role, function ($query) {
            $query->where([
                'user_id' => auth()->id(),
            ]);
        })->where([
            'academic_year_id' => $academicYearId
        ])->orderBy($column, $direction)
            ->paginate($limit);
    }

    public function storeProfile(
        CreateAdmissionProfileDto $dto,
        string|null $activeAcademicYear = null,
        bool|null $sameAddress = false
    ): AdmissionPersonalProfile|null {
        return AdmissionPersonalProfile::create([
            'user_id' => auth()->id(),
            'academic_year_id' => $activeAcademicYear,
            'campus_id' => $dto->campus,
            'application_status' => AdmissionApplicationStatus::application_pending()->value,
            'application_progress' => AdmissionApplicationProgress::education()->value,
            'profile_photo' => null,
            'first_name' => $dto->first_name,
            'middle_name' => $dto->middle_name,
            'last_name' => $dto->last_name,
            'sex_at_birth' => $dto->sex,
            'gender_preference' => $dto->gender_preference,
            'street' => $dto->street,
            'barangay' => $dto->barangay,
            'municipality' => $dto->city,
            'province' => $dto->province,
            'region' => $dto->region,
            'zip_code' => $dto->zip_code,
            'temporary_street' => $sameAddress ? $dto->street : $dto->temporary_street,
            'temporary_barangay' => $sameAddress ? $dto->barangay : $dto->temporary_barangay,
            'temporary_municipality' => $sameAddress ? $dto->city : $dto->temporary_city,
            'temporary_province' => $sameAddress ? $dto->province : $dto->temporary_province,
            'temporary_region' => $sameAddress ? $dto->region : $dto->temporary_region,
            'temporary_zip_code' => $sameAddress ? $dto->zip_code : $dto->temporary_zip_code,
            'mobile_number' => $dto->phone_number,
            'landline_number' => $dto->landline_number,
            'email_address' => $dto->email_address,
            'facebook_account' => $dto->facebook_account,
            'date_of_birth' => $dto->date_of_birth,
            'place_of_birth' => $dto->place_of_birth,
            'citizenship' => $dto->citizenship,
            'gender' => $dto->gender_preference,
            'civil_status' => $dto->civil_status,
            'religion' => $dto->religion,
            'rank_in_family' => $dto->rank_in_family,
            'number_of_siblings' => $dto->number_of_siblings,
            'mean_ages_of_siblings' => $dto->ages_of_siblings,
            'special_skills' => $dto->special_skills,
            'favorite_sports' => $dto->favorite_sports,
            'scholarship_grantee' => $dto->scholarship_grantee,
            'lrn' => $dto->lrn,
            'program_first_choice' => $dto->program_first_choice,
            'program_second_choice' => $dto->program_second_choice,
            'program_third_choice' => $dto->program_third_choice,
            'gadget' => $dto->gadget,
            'internet_status' => $dto->internet_status,
        ]);
    }

    public function storeEducation(CreateAdmissionEducationDto $dto, AdmissionPersonalProfile|int $profile)
    {
        return AdmissionEducation::create([
            'admission_personal_profile_id' => $profile,
            'level_id' => $dto->level_id,
            'school' => $dto->school,
            'degree' => $dto->degree,
            'inclusive_dates_from' => $dto->inclusive_dates_from,
            'inclusive_dates_to' => $dto->inclusive_dates_to,
            'honors' => $dto->honors
        ]);
    }
}