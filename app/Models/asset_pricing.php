<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asset_pricing extends Model
{
    protected $fillable = [
        'asset_id',
        'period',
        'is_primary',
        'price',
    ];

    public function asset(){
        return $this->belongsTo(asset::class);
    }

    public function bookings(){
        return $this->hasMany(booking::class);
    }
}
