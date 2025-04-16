<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Notification extends Component
{

    public $event ;
    public $user_id;

    public $id ;
    
     public function mount()
    {
        $this->user_id = Auth::user()->id;
    }
    

    
    #[On('echo-notification:App.Models.User.{user_id}, notification')]
    public function notify($notification)
    {
        if ($notification['type'] == 'App\Notifications\PopulatePokemon' || $notification['type'] == 'App\Notifications\PopulatePeoples') {
                //     if($notification['notification'] == 'populated_database')
             } 
                $this->event = $notification['event'];
          
    }


    public function render()
    {   
        $time = Carbon::now();
            return view('livewire.notification', [
                'time' => $time,
            ]);
    }
}
