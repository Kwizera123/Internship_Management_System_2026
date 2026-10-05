<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Faculty extends Model
{
    protected $fillable = [
        'name',
         'institution_id',
    ];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }

    public function departments(): HasMany
    {
        return $this->hasMany(Department::class);
    }
}
