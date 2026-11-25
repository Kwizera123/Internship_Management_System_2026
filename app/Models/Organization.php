<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Organization extends Model
{
            protected $fillable = [
            'name',
            'type',
            'email',
            'phone',
            'address',
            'website',
            'description',
        ];

        public function internshipOpportunities(): HasMany
            {
                return $this->hasMany(InternshipOpportunity::class);
            }
}
