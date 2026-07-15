<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asset_image extends Model
{
    protected $fillable = [
        'image'
    ];

    public function asset(){
        return $this->belongsTo(asset::class);
    }
}
