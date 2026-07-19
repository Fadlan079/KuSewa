<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asset_category extends Model
{
    protected $fillable = [
        'name',
        'icon',
    ];

    public function assets()
    {
        return $this->hasMany(asset::class);
    }
}
