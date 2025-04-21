<?php

use App\Broadcasting\ChatChannel;
use Illuminate\Support\Facades\Broadcast;

Broadcast::channel('App.Models.User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('global', function ($user) {
    return ['id' => $user->id, 'name' => $user->name];
});

Broadcast::channel('chat.{channel}', ChatChannel::class);
