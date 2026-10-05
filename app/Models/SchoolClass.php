<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Institution;


class SchoolClass extends Model
{
    protected $table = 'classes';
    protected $fillable = [
        'name',
        'institution_id',
    ];

    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }


}
