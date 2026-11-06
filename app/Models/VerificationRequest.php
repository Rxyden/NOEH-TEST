<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class VerificationRequest extends Model
{
    protected $fillable = [
        'institution_id',
        'submitted_by',
        'reviewed_by',
        'request_type',
        'target_type',
        'target_id',
        'title',
        'submitted_data',
        'review_notes',
        'status',
        'reviewed_at',
    ];

    protected function casts(): array
    {
        return [
            'submitted_data' => 'array',
            'reviewed_at' => 'datetime',
        ];
    }

    // Institution associated with this request
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    // User who submitted the request
    public function submitter(): BelongsTo
    {
        return $this->belongsTo(User::class, 'submitted_by');
    }

    // Administrator who reviewed the request
    public function reviewer(): BelongsTo
    {
        return $this->belongsTo(User::class, 'reviewed_by');
    }
}
