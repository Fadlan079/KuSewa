<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class booking extends Model
{
    protected $fillable = [
        'asset_id',
        'asset_pricing_id',
        'user_id',
        'start_date',
        'end_date',
        'booking_status'
    ];

    public function asset(){
        return $this->belongsTo(asset::class);
    }

    public function assetPricing(){
        return $this->belongsTo(asset_pricing::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function payment(){
        return $this->hasOne(payment::class);
    }

    public function reviews(){
        return $this->hasMany(review::class);
    }
}
