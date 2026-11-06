<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AdmissionContact extends Model
{
    protected $fillable = [
        'admission_cycle_id',
        'office_name',
        'contact_person',
        'email',
        'phone',
        'office_address',
        'office_hours',
        'is_primary',
    ];

    protected function casts(): array
    {
        return [
            'is_primary' => 'boolean',
        ];
    }

    public function admissionCycle(): BelongsTo
    {
        return $this->belongsTo(AdmissionCycle::class);
    }
}
