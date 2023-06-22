<?php

namespace App\Domain\College\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class College extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded = [];
}