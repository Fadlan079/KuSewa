<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class asset_image extends Model
{
    protected $fillable = [
        'image'
    ];

    protected $appends = ['image_url'];

    public function getImageUrlAttribute()
    {
        if (!$this->image) {
            return null;
        }

        // Jika file ada di folder public/ direktori langsung (bukan symlink storage)
        if (file_exists(public_path($this->image))) {
            return '/' . $this->image;
        }

        // Sebaliknya gunakan path storage
        return '/storage/' . $this->image;
    }

    public function asset(){
        return $this->belongsTo(asset::class);
    }
}
