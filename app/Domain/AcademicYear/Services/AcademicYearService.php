<?php

namespace App\Domain\AcademicYear\Services;

use Domain\AcademicYear\Enums\AcademicYearStatus;
use Domain\AcademicYear\Enums\ModuleType;
use Domain\AcademicYear\Models\AcademicYear;
use Illuminate\Support\Collection;

class AcademicYearService
{
    public function active(AcademicYearStatus $status, ModuleType $module): AcademicYear
    {
        return AcademicYear::where([
            'status' => $status->value,
            'module_type' => $module->value
        ])->first();
    }

    public function all(ModuleType $module): Collection
    {
        return AcademicYear::where([
            'module_type' => $module->value
        ])->get();
    }
}