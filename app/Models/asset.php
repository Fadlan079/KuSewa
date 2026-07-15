<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asset extends Model
{
    protected $fillable = [
        'owner_profile_id',
        'title',
        'description',
        'detail',
        'latitude',
        'longitude',
        'status',
    ];

    public function ownerProfile(){
        return $this->belongsTo(owner_profile::class);
    }

    public function assetImages(){
        return $this->hasMany(asset_image::class);
    }

    public function assetPricing(){
        return $this->hasOne(asset_pricing::class);
    }

    public function bookings(){
        return $this->hasMany(booking::class);
    }

    public function favorites(){
        return $this->hasMany(favorite::class);
    }

    public function roomChats(){
        return $this->hasMany(room_chat::class);
    }
}
