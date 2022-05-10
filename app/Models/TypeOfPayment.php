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

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }

    public function schoolYear()
    {
        return $this->belongsTo(SchoolYear::class);
    }
}
