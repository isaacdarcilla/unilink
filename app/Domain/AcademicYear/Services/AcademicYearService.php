<?php

namespace App\Domain\AcademicYear\Services;

use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Domain\AcademicYear\Models\AcademicYear;

class AcademicYearService
{
    public function active(AcademicYearStatus $status, ModuleType $module)
    {
        return AcademicYear::where([
            'status' => $status->value,
            'module_type' => $module->value
        ])->first();
    }
}