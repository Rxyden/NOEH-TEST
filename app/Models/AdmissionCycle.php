<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class AdmissionCycle extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'institution_id',
        'campus_id',
        'academic_year',
        'term',
        'application_start_date',
        'application_end_date',
        'application_url',
        'instructions',
        'admission_status',
        'is_published',
    ];

    protected function casts(): array
    {
        return [
            'application_start_date' => 'date',
            'application_end_date' => 'date',
            'is_published' => 'boolean',
        ];
    }

    // Institution responsible for this admission cycle
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    // Campus associated with this admission cycle
    public function campus(): BelongsTo
    {
        return $this->belongsTo(Campus::class);
    }

    // Admission requirements
    public function requirements(): HasMany
    {
        return $this->hasMany(AdmissionRequirement::class);
    }

    // Admission contact information
    public function contacts(): HasMany
    {
        return $this->hasMany(AdmissionContact::class);
    }

    // Admission procedure steps
    public function procedures(): HasMany
    {
        return $this->hasMany(AdmissionProcedure::class);
    }
}
