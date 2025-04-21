<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $guarded = [];

    public function Chat()
    {
        return $this->belongsTo(ChatRoom::class);
    }
}
