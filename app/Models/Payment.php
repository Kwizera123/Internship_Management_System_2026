<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    protected $fillable = [
        'student_fee_id',
        'amount',
        'payment_method',
        'reference',
        'status',
        'rejection_reason',
        'verified_at',
    ];

 public   function studentFee() : BelongsTo
    {
        return $this->belongsTo(StudentFee::class);
    }

}
