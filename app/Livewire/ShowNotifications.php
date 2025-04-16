<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class ShowNotifications extends Component
{

    public $notification;
    public $flag = false;
    public $user_id;

    public function mount()
    {
        $this->user_id = Auth::user()->id;
    }


    #[On('echo-notification:App.Models.User.{user_id}, notification')]
        public function getNotification($event, $friend_id) {

            $this->notification = collect($event , $friend_id); 
         }   



    public function render()
    {
        return view('livewire.show-notifications');
    }
}
