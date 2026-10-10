<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\StudentFee;

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

    public function studentFee() : BelongsTo
        {
            return $this->belongsTo(StudentFee::class);
        }

    public function verify(): self
    {
        return \Illuminate\Support\Facades\DB::transaction(
            function () {
                // Lock the fee first so verifications for that fee
            // are processed one at a time.
            $fee = StudentFee::whereKey($this->student_fee_id)
                ->lockForUpdate()
                ->firstOrFail();
             // Reload and lock the payment before checking its status.
             $payment = self::whereKey($this->getKey())
                ->lockForUpdate()
                ->firstOrFail();

        if ($payment->status !== 'pending') {
            throw new \LogicException(
                'Only pending payments can be verified.'
                );
        }

        $payment->update([
            'status' => 'verified',
            'verified_at' => now(),
        ]);

        // Recalculate and save the fee status.
        $fee->syncStatus();

        return $payment->refresh();
        }

        ); 

        
        

    }
}
