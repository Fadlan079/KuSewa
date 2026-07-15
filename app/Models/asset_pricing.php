<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asset_pricing extends Model
{
    protected $fillable = [
        'asset_id',
        'subtotal',
        'service_fee',
        'total',
    ];

    public function asset(){
        return $this->belongsTo(asset::class);
    }

    public function booking(){
        return $this->hasMany(booking::class);
    }
}
