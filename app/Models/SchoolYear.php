<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolYear extends Model
{
    use HasFactory;
    const STATUS_ACTIVE = true;
    const STATUS_NOT_ACTIVE = false;

    protected $fillable = [
        'school_year',
        'status'
    ];
}
