<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\BroadcastMessage;

class FriendRequest extends Notification
{
    use Queueable;

    public $event , $friend_id;

    /**
     * Create a new notification instance.
     */
    public function __construct($event , $friend_id)
    {
        $this->$event = $event;
        $this-> $friend_id = $friend_id;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['broadcast' , 'database '];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toBroadcast(object $notifiable): BroadcastMessage
    {
        return (new BroadcastMessage([
            'event' => $this->event,
            'friend_id' => $this->friend_id,
        ]));
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'event' => $this->event,
            'friend_id' => $this->friend_id,
        ];
    }
}
