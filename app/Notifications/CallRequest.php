<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class CallRequest extends Notification
{
    use Queueable;
    public $event, $friend_id, $name;
    /**
     * Create a new notification instance.
     */
    public function __construct($friend_id , $event , $name)
    {
        $this->friend_id = $friend_id;
        $this->event = $event;
        $this->name = $name;

    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toBraodcast(object $notifiable): BroadcastMessage
    {
        return (new BroadcastMessage([
            'friend_id' => $this->friend_id,
            'event' => $this->event,
            'name' => $this->name,
        ]));
            
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        Log::info($this->friend_id . $this->event . $this->name);

        return [
            'friend_id' => $this->friend_id,
            'event' => $this->event,
            'name' => $this->name,
        ];
    }
}
