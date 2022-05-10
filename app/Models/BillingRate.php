<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillingRate extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_id',
        'billing',
        'type_of_payment_id'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function typeOfPayment()
    {
        return $this->belongsTo(TypeOfPayment::class);
    }
}
