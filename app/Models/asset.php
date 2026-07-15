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
}
