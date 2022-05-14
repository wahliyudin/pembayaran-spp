<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Free extends Model
{
    use HasFactory;

    protected $with = ['student'];

    protected $fillable = [
        'student_id',
        'type_of_payment_id',
        'free_bill',
        'total_payment'
    ];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function freePayments()
    {
        return $this->hasMany(FreePayment::class);
    }

    public function typeOfPayment()
    {
        return $this->belongsTo(TypeOfPayment::class);
    }
}
