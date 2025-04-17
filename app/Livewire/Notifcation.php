<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Notifcation extends Component
{
    public $notification;
    public $user_id;
    public $notification_list;
    public function mount() {
        $this->user_id = Auth::id();

        $this->notification = collect();
        $notifications = Auth::user()->unreadNotifications()->get();


        if($notifications->count()) {
            foreach($notifications as $notification) {
                $name = User::select('id', 'name')->where('id' , $notification->data['friend_id'])->first();
                $this->notification->push([
                    'name' => $name->name,
                    'event' =>$notification->data['event'],
                    'friend_id' => $notification->data['friend_id'],
                    'id' => $notification->id                
                ]);
            }
        };
    }

    #[On('echo-notification:App.Models.User.{user_id}, notification')]
    public function gotNotification($notification) {
        if ($notification['type'] == 'App\Notifications\FriendRequest'){
            $this->notification_list = collect($this->notification_list);

            $name = User::select('id', 'name')->where('id' , $notification['friend_id'])->first();
            $this->notification_list->push([
                'id' => $notification['id'],
                'event' =>$notification['event'],
                'friend_id' => $notification['friend_id'],
                'name' => $name->name,
            ]);
        } 
        // if($notification['event'] == 'accepted')  {
        //     $this->dispatch('acceptFriend', ['friend_id' => $notification->data['friend_id']]);
        // }elseif($notification['event'] == 'removed') {
        //     $this->dispatch('removeFriend', ['friend_id' => $notification->data['friend_id']]);

        // }
    }
    public function render()
    {

        return view('livewire.notifcation');
    }
}
