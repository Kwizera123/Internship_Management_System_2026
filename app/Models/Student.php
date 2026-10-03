<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Student extends Model
{
    protected $fillable = [
        'student_number',
        'first_name',
        'last_name',
        'student_type',
    ];
    //

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }
}
