<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Institution;
use App\Models\StudentRegistration;



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

    public function registrations(): HasMany
    {
        return $this->hasMany(StudentRegistration::class);
    }

}
