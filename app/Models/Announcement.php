<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Announcement extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'created_by',
        'title',
        'slug',
        'announcement_type',
        'summary',
        'content',
        'featured_image',
        'published_at',
        'expires_at',
        'status',
        'is_featured',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'expires_at' => 'datetime',
            'is_featured' => 'boolean',
        ];
    }

    // User who created this announcement
    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    // Institutions associated with this announcement
    public function institutions(): BelongsToMany
    {
        return $this->belongsToMany(
            Institution::class,
            'announcement_institutions'
        )->withTimestamps();
    }
}
