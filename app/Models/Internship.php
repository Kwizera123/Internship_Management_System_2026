<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Internship extends Model
{
    protected $fillable = [
        'student_id',
        'organization_name',
        'start_date',
        'end_date',
        'status',
    ];

  public function student(): BelongsTo
{
    return $this->belongsTo(Student::class);
}
}
