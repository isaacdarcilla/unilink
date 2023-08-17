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

    public function getByCollege(int|null $college, string|int $programStatus = 1): Collection
    {
        return Program::where([
            'college_id' => $college,
            'status' => $programStatus
        ])->get();
    }
}