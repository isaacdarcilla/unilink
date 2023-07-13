<?php

namespace App\Domain\Admission\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed $answer
 * @property mixed $choices
 * @property mixed $id
 * @property mixed $points
 * @method static pluck(string $string)
 */
class AdmissionQuestionnaire extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];

    protected $casts = [
        'choices' => 'array'
    ];
}