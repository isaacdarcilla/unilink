<?php

namespace App\Domain\College\Services;

use App\Domain\College\Models\College;

class CollegeService
{
    public function getColleges(string $status = 'active')
    {
        return College::where('status', $status)->get();
    }
}
