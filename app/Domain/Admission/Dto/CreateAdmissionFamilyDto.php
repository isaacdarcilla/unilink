<?php

namespace App\Domain\Admission\Dto;

class CreateAdmissionFamilyDto
{
    public function __construct(
        public string|int $type,
        public string $last_name,
        public string $first_name,
        public ?string $middle_name,
        public string $address,
        public ?string $email_address,
        public string $mobile_number,
        public string $highest_educational_attainment,
        public string $occupation,
        public string $monthly_income,
        public ?string $company,
        public ?string $company_address,
    ) {
    }

    public static function fromArray(array $request): CreateAdmissionFamilyDto
    {
        return new self(
            type: $request['type'],
            last_name: $request['last_name'],
            first_name: $request['first_name'],
            middle_name: $request['middle_name'] ?? null,
            address: $request['address'],
            email_address: $request['email_address'] ?? null,
            mobile_number: $request['mobile_number'],
            highest_educational_attainment: $request['highest_educational_attainment'],
            occupation: $request['occupation'],
            monthly_income: $request['monthly_income'],
            company: $request['company'] ?? null,
            company_address: $request['company_address'] ?? null,
        );
    }
}