<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $fillable = [
        'enrollment', 'reference', 'profile', 'surname', 'first_name', 'middle_name', 'extension_name', 'sex',
        'building_no', 'street', 'barangays_id', 'municipality', 'province','region', 'contact_number', 'date_birth',
        'place_birth', 'religion', 'civil_status', 'name_spouse'
    ];

    public function barangay(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Barangay::class, 'barangays_id');
    }
}

