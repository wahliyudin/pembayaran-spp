<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeOfPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id',
        'type_payment',
        'type',
        'school_year_id'
    ];
}
