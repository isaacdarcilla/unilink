<?php

namespace App\Domain\Admission\Dto;

use App\Domain\Admission\Requests\AdmissionPersonalDataRequest;
use Domain\Admission\Enums\InternetStatus;
use Domain\Admission\Enums\ScholarshipGranteeEnum;
use Domain\Admission\Models\AdmissionPersonalProfile;

class CreateAdmissionProfileDto
{
    public function __construct(
        public string $first_name,
        public ?string $middle_name,
        public string $last_name,
        public string $sex,
        public string $gender_preference,
        public string $region,
        public string $province,
        public string $city,
        public string $barangay,
        public string $street,
        public string $zip_code,
        public ?string $temporary_region,
        public ?string $temporary_province,
        public ?string $temporary_city,
        public ?string $temporary_barangay,
        public ?string $temporary_street,
        public ?string $temporary_zip_code,
        public string $phone_number,
        public ?string $landline_number,
        public string $email_address,
        public ?string $facebook_account,
        public string $date_of_birth,
        public string $place_of_birth,
        public string $citizenship,
        public string $civil_status,
        public string $religion,
        public string $number_of_siblings,
        public string $ages_of_siblings,
        public string $rank_in_family,
        public array|string $special_skills,
        public array|string $favorite_sports,
        public string $scholarship_grantee,
        public ?string $lrn,
        public string $program_first_choice,
        public string $program_second_choice,
        public string $program_third_choice,
        public array|string $gadget,
        public string $internet_status,
        public string $campus,
    ) {
    }

    public static function fromRequest(AdmissionPersonalDataRequest $request): CreateAdmissionProfileDto
    {
        return new self(
            first_name: $request->validated('first_name'),
            middle_name: $request->validated('middle_name'),
            last_name: $request->validated('last_name'),
            sex: $request->validated('sex'),
            gender_preference: $request->validated('gender_preference'),
            region: $request->validated('region'),
            province: $request->validated('province'),
            city: $request->validated('city'),
            barangay: $request->validated('barangay'),
            street: $request->validated('street'),
            zip_code: $request->validated('zip_code'),
            temporary_region: $request->validated('temporary_region'),
            temporary_province: $request->validated('temporary_province'),
            temporary_city: $request->validated('temporary_city'),
            temporary_barangay: $request->validated('temporary_barangay'),
            temporary_street: $request->validated('temporary_street'),
            temporary_zip_code: $request->validated('temporary_zip_code'),
            phone_number: $request->validated('phone_number'),
            landline_number: $request->validated('landline_number'),
            email_address: $request->validated('email_address'),
            facebook_account: $request->validated('facebook_account'),
            date_of_birth: $request->validated('date_of_birth'),
            place_of_birth: $request->validated('place_of_birth'),
            citizenship: $request->validated('citizenship'),
            civil_status: $request->validated('civil_status'),
            religion: $request->validated('religion'),
            number_of_siblings: $request->validated('number_of_siblings'),
            ages_of_siblings: $request->validated('ages_of_siblings'),
            rank_in_family: $request->validated('rank_in_family'),
            special_skills: $request->validated('special_skills'),
            favorite_sports: $request->validated('favorite_sports'),
            scholarship_grantee: $request->validated('scholarship_grantee'),
            lrn: $request->validated('lrn'),
            program_first_choice: $request->validated('program_first_choice'),
            program_second_choice: $request->validated('program_second_choice'),
            program_third_choice: $request->validated('program_third_choice'),
            gadget: $request->validated('gadget'),
            internet_status: $request->validated('internet_status'),
            campus: $request->validated('campus'),
        );
    }

    public static function fromArray(array $request): CreateAdmissionProfileDto
    {
        return new self(
            first_name: $request['first_name'],
            middle_name: $request['middle_name'],
            last_name: $request['last_name'],
            sex: $request['sex'],
            gender_preference: $request['gender_preference'],
            region: $request['region'],
            province: $request['province'],
            city: $request['city'],
            barangay: $request['barangay'],
            street: $request['street'],
            zip_code: $request['zip_code'],
            temporary_region: $request['temporary_region'],
            temporary_province: $request['temporary_province'],
            temporary_city: $request['temporary_city'],
            temporary_barangay: $request['temporary_barangay'],
            temporary_street: $request['temporary_street'],
            temporary_zip_code: $request['temporary_zip_code'],
            phone_number: $request['phone_number'],
            landline_number: $request['landline_number'],
            email_address: $request['email_address'],
            facebook_account: $request['facebook_account'],
            date_of_birth: $request['date_of_birth'],
            place_of_birth: $request['place_of_birth'],
            citizenship: $request['citizenship'],
            civil_status: $request['civil_status'],
            religion: $request['religion'],
            number_of_siblings: $request['number_of_siblings'],
            ages_of_siblings: $request['ages_of_siblings'],
            rank_in_family: $request['rank_in_family'],
            special_skills: $request['special_skills'],
            favorite_sports: $request['favorite_sports'],
            scholarship_grantee: ScholarshipGranteeEnum::from($request['scholarship_grantee'])->value,
            lrn: $request['lrn'],
            program_first_choice: $request['program_first_choice'],
            program_second_choice: $request['program_second_choice'],
            program_third_choice: $request['program_third_choice'],
            gadget: $request['gadget'],
            internet_status: InternetStatus::from($request['internet_status'])->value,
            campus: $request['campus'],
        );
    }

    public static function fillArray(AdmissionPersonalProfile $admissionPersonalProfile): array
    {
        return [
            'first_name' => $admissionPersonalProfile->first_name,
            'middle_name' => $admissionPersonalProfile?->middle_name,
            'last_name' => $admissionPersonalProfile->last_name,
            'sex' => str($admissionPersonalProfile->sex_at_birth)->title(),
            'gender_preference' => str($admissionPersonalProfile->gender_preference)->title(),
        ];
    }
}