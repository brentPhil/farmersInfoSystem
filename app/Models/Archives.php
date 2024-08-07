<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Archives extends Model
{
    protected $fillable = ['data', 'farmers_id'];

    public function farmer()
    {
        return $this->belongsTo(Farmer::class, 'farmers_id');
    }

    public function barangay()
    {
        return $this->belongsTo(Barangay::class, 'barangays_id');
    }

}
