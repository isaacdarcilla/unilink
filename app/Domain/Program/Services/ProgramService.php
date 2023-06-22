<?php

namespace Domain\Program\Services;

use Domain\Program\Enums\ProgramStatus;
use Domain\Program\Models\Program;
use Illuminate\Database\Eloquent\Collection;

class ProgramService
{
    public function all(ProgramStatus $programStatus): Collection
    {
        return Program::whereStatus($programStatus)->get();
    }
}