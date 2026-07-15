<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class message extends Model
{
    protected $fillable = [
        'room_chat_id',
        'is_read',
        'message_type',
        'message'
    ];

    public function roomChats(){
        return $this->belongsTo(room_chat::class);
    }
}
