<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class StudentFee extends Model
{
    protected $fillable = [
        'student_id',
        'fee_configuration_id',
        'amount',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'amount' => 'integer',
        ];
    }

    public function student() : BelongsTo
    {
        return $this->belongsTo(Student::class);
    }

    public function feeConfiguration() : BelongsTo
    {
        return $this->belongsTo(FeeConfiguration::class);
    }

    public function payments() : HasMany
    {
        return $this->hasMany(Payment::class);
    }
}
