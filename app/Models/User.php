<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'email', 'password'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // User roles, including institution-specific assignments
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(
            Role::class,
            'user_roles'
        )->withPivot('institution_id')
         ->withTimestamps();
    }

    // User favorites
        public function favorites(): HasMany
        {
            return $this->hasMany(Favorite::class, 'user_id');
        }

    // User's saved scholarships
    public function savedScholarships(): BelongsToMany
    {
        return $this->belongsToMany(
            Scholarship::class,
            'saved_scholarships'
        )->withTimestamps();
    }

    // User's institution comparisons
    public function comparisons(): HasMany
    {
        return $this->hasMany(Comparison::class);
    }

    // User activity history
    public function activityLogs(): HasMany
    {
        return $this->hasMany(ActivityLog::class);
    }

    // Verification requests submitted by the user
    public function submittedVerificationRequests(): HasMany
    {
        return $this->hasMany(
            VerificationRequest::class,
            'submitted_by'
        );
    }

    // Verification requests reviewed by the user
    public function reviewedVerificationRequests(): HasMany
    {
        return $this->hasMany(
            VerificationRequest::class,
            'reviewed_by'
        );
    }

    // Announcements created by the user
    public function createdAnnouncements(): HasMany
    {
        return $this->hasMany(
            Announcement::class,
            'created_by'
        );
    }
}
