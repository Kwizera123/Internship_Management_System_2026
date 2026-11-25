<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InternshipOpportunity extends Model
{
        protected $fillable = [
        'organization_id',
        'title',
        'description',
        'location',
        'eligibility',
        'available_positions',
        'application_deadline',
        'approval_status',
        'publication_status',
        'submitted_at',
        ];

        public function organization(): BelongsTo
            {
                return $this->belongsTo(Organization::class);
            }
}
