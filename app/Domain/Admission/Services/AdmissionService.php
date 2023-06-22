<?php

namespace App\Domain\Admission\Services;

use App\Domain\Admission\Dto\CreateAdmissionProfileDto;
use App\Domain\Admission\Enums\AdmissionApplicationStatus;
use Domain\Admission\Models\AdmissionPersonalProfile;

class AdmissionService
{
    public function storeProfile(
        CreateAdmissionProfileDto $dto,
        string|null $activeAcademicYear = null
    ): AdmissionPersonalProfile|null {
        return AdmissionPersonalProfile::create([
            'user_id' => auth()->id(),
            'academic_year_id' => $activeAcademicYear,
            'campus_id' => $dto->campus,
            'application_status' => AdmissionApplicationStatus::application_pending()->value,
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
            'temporary_street' => $dto->temporary_street,
            'temporary_barangay' => $dto->temporary_barangay,
            'temporary_municipality' => $dto->temporary_city,
            'temporary_province' => $dto->temporary_province,
            'temporary_region' => $dto->temporary_region,
            'temporary_zip_code' => $dto->temporary_zip_code,
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
}