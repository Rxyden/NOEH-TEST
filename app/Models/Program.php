<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Program extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'institution_id',
        'program_name',
        'program_code',
        'slug',
        'degree_level',
        'description',
        'duration_years',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'duration_years' => 'decimal:1',
            'is_active' => 'boolean',
        ];
    }

    // Institution offering this program
    public function institution(): BelongsTo
    {
        return $this->belongsTo(Institution::class);
    }

    // Campuses offering this program
    public function campuses(): BelongsToMany
    {
        return $this->belongsToMany(
            Campus::class,
            'campus_programs'
        )->withPivot('is_active')
         ->withTimestamps();
    }
    public function favorites()
    {
        return $this->morphMany(Favorite::class, 'favoritable');
    }
}
