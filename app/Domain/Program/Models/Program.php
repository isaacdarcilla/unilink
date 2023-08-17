<?php

namespace Domain\Program\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @method static whereStatus(\Domain\Program\Enums\ProgramStatus $programStatus)
 * @method static pluck(string $string)
 */
class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
}