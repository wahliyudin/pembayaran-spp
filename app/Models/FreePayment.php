<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FreePayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'free_id',
        'user_id',
        'payment_number',
        'billing',
        'description'
    ];

    public function free()
    {
        return $this->belongsTo(Free::class);
    }
}
