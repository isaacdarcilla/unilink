<?php

namespace App\Domain\Campus\Services;

use Domain\Campus\Enums\CampusStatus;
use Domain\Campus\Models\Campus;
use Illuminate\Database\Eloquent\Collection;

class CampusService
{
    public function all(CampusStatus $campusStatus): Collection
    {
        return Campus::whereStatus($campusStatus->value)->get();
    }
}