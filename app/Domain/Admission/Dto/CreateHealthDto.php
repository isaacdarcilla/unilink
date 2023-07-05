<?php

namespace App\Domain\Admission\Dto;

use Domain\Admission\Enums\InternetStatus;
use Domain\Admission\Enums\ScholarshipGranteeEnum;

class CreateHealthDto
{
    public function __construct(
        public string $height,
        public string $weight,
        public string $facial_marks,
        public string $physical_condition,
        public string $emergency_contact,
        public string $relationship,
        public string $emergency_contact_address,
        public string $emergency_contact_number,
    ) {
    }

    public static function fromArray(array $request): CreateHealthDto
    {
        return new self(
            height: $request['height'],
            weight: $request['weight'],
            facial_marks: $request['facial_marks'],
            physical_condition: $request['physical_condition'],
            emergency_contact: $request['emergency_contact'],
            relationship: $request['relationship'],
            emergency_contact_address: $request['emergency_contact_address'],
            emergency_contact_number: $request['emergency_contact_number']
        );
    }
}