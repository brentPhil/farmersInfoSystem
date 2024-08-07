<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Barangay extends Model
{
    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangays_id');
    }

    public function archives()
    {
        return $this->hasMany(Archives::class, 'barangays_id'); // Adjust foreign key if needed
    }
}

