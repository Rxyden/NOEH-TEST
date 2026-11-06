<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Scholarship extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'scholarship_name',
        'slug',
        'provider_name',
        'scholarship_type',
        'description',
        'benefits',
        'financial_amount',
        'coverage_type',
        'eligibility',
        'education_level',
        'application_start_date',
        'application_deadline',
        'application_url',
        'official_website',
        'verification_status',
        'is_published',
        'verified_by',
        'verified_at',
    ];

    protected function casts(): array
    {
        return [
            'financial_amount' => 'decimal:2',
            'application_start_date' => 'date',
            'application_deadline' => 'date',
            'is_published' => 'boolean',
            'verified_at' => 'datetime',
        ];
    }

    // Institutions where this scholarship is available
    public function institutions(): BelongsToMany
    {
        return $this->belongsToMany(
            Institution::class,
            'scholarship_institutions'
        )->withPivot('availability_notes')
         ->withTimestamps();
    }

    // Scholarship requirements
    public function requirements(): HasMany
    {
        return $this->hasMany(ScholarshipRequirement::class);
    }

    // Users who saved this scholarship
    public function savedByUsers(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'saved_scholarships'
        )->withTimestamps();
    }

    // User who verified this scholarship
    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
}
