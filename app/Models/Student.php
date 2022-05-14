<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    const STATUS_ACTIVE = true;
    const STATUS_INACTIVE = false;

    protected $fillable = [
        'nim',
        'name',
        'data_class_id',
        'major_id',
        'status'
    ];

    public function dataClass()
    {
        return $this->belongsTo(DataClass::class);
    }

    public function major()
    {
        return $this->belongsTo(Major::class);
    }

    public function frees()
    {
        return $this->hasMany(Free::class);
    }

    public function monthly()
    {
        return $this->hasOne(Monthly::class);
    }
}
