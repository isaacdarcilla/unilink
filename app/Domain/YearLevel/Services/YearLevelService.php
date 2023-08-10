<?php

namespace App\Domain\YearLevel\Services;

use App\Domain\YearLevel\Models\YearLevel;

class YearLevelService
{
    public function getYearLevelsByCollege(string|int|null $collegeId, int $status = 1)
    {
        return YearLevel::where([
            'college_id' => $collegeId,
            'status' => $status,
        ])->get();
    }
}