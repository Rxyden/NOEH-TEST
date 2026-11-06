<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Institution extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'institution_name',
        'slug',
        'institution_type',
        'description',
        'logo',
        'website_url',
        'email',
        'phone',
        'ownership_type',
        'accreditation_status',
        'verification_status',
        'is_published',
        'verified_by',
        'verified_at',
    ];

    protected function casts(): array
    {
        return [
            'is_published' => 'boolean',
            'verified_at' => 'datetime',
        ];
    }

    // Campuses owned by this institution
    public function campuses(): HasMany
    {
        return $this->hasMany(Campus::class);
    }

    // Academic programs offered by this institution
    public function programs(): HasMany
    {
        return $this->hasMany(Program::class);
    }

    // Admission cycles of this institution
    public function admissionCycles(): HasMany
    {
        return $this->hasMany(AdmissionCycle::class);
    }

    // Scholarships available at this institution
    public function scholarships(): BelongsToMany
    {
        return $this->belongsToMany(
            Scholarship::class,
            'scholarship_institutions'
        )->withPivot('availability_notes')
         ->withTimestamps();
    }

    // Announcements associated with this institution
    public function announcements(): BelongsToMany
    {
        return $this->belongsToMany(
            Announcement::class,
            'announcement_institutions'
        )->withTimestamps();
    }

    // Verification requests submitted for this institution
    public function verificationRequests(): HasMany
    {
        return $this->hasMany(VerificationRequest::class);
    }

    // User who verified this institution
    public function verifier(): BelongsTo
    {
        return $this->belongsTo(User::class, 'verified_by');
    }
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }
}
