<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyPayment extends Model
{
    use HasFactory;

    const STATUS_TRUE = 1;
    const STATUS_FALSE = 0;

    protected $fillable = [
        'user_id',
        'month_id',
        'monthly_id',
        'month_bill',
        'payment_number',
        'description',
        'payment_date',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function month()
    {
        return $this->belongsTo(Month::class);
    }

    public function monthly()
    {
        return $this->belongsTo(Monthly::class);
    }
}
