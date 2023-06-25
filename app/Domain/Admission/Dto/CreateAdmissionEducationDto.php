<?php

namespace App\Domain\Admission\Dto;

use Carbon\Carbon;

class CreateAdmissionEducationDto
{
    public function __construct(
        public string $level_id,
        public string $school,
        public string $degree,
        public string $inclusive_dates_from,
        public string $inclusive_dates_to,
        public ?string $honors,
    ) {
    }

    public static function fromArray(array $request): CreateAdmissionEducationDto
    {
        return new self(
            level_id: $request['level'],
            school: $request['school_attended'],
            degree: $request['degree_received'],
            inclusive_dates_from: Carbon::parse($request['inclusive_date_from'])->format('Y-m-d H:i:s'),
            inclusive_dates_to: Carbon::parse($request['inclusive_date_to'])->format('Y-m-d H:i:s'),
            honors: $request['honors_received'] ?? null
        );
    }
}