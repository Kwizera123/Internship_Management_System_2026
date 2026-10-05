<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\StudentRegistration;

class AcademicYear extends Model
{
    protected $fillable = [
        'name',
        'start_date',
        'end_date',
    ];
    //
public function registrations(): HasMany
    {
        return $this->hasMany(StudentRegistration::class);
    }

}
