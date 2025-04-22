<?php

namespace App\Events;

use Illuminate\Support\Facades\Log;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ChatUpdated implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    public $channel;
    public $type;
    public $message;
    public $sender_id;


    /**
     * Create a new event instance.
     */
    public function __construct($channel, $type, $message, $sender_id)
    {
        $this->channel = $channel;
        Log::info($this->channel);
        $this->type = $type;
        $this->message = $message;
        $this->sender_id = $sender_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return array<int, \Illuminate\Broadcasting\Channel>
     */
    public function broadcastOn(): array
    {
        Log::info('Event fired');
        return [
            new PrivateChannel('chat.' . $this->channel),
        ];
    }
}
