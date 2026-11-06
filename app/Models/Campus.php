<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campus extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'institution_id',
        'campus_name',
        'slug',
        'campus_type',
        'address',
        'barangay',
        'city_municipality',
        'province',
        'postal_code',
        'latitude',
        'longitude',
        'is_main_campus',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'latitude' => 'decimal:7',
            'longitude' => 'decimal:7',
            'is_main_campus' => 'boolean',
            'is_active' => 'boolean',
        ];
    }

    // Institution that owns this campus
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    // Academic programs offered at this campus
    public function programs(): BelongsToMany
    {
        return $this->belongsToMany(
            Program::class,
            'campus_programs'
        )->withPivot('is_active')
         ->withTimestamps();
    }

    // Admission cycles associated with this campus
    public function admissionCycles(): HasMany
    {
        return $this->hasMany(AdmissionCycle::class);
    }
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }
}
