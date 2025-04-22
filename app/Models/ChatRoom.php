<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatRoom extends Model
{
    protected $guarded = [];


    public function Messages()
    {
        $this->hasMany(Message::class);
    }
}
