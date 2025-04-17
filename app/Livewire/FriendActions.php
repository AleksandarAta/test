<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Friend;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Notifications\FriendRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class FriendActions extends Component
{
    public $user;
    public $accepted;
    public $status = "";

    public function mount(User $user) {
        $this->user = $user;

        $this->showRequest($user->id);
    }

    #[On('addUser')]
    public function addFriend($friend_id)
     {
        $user = Auth::id();


        $this->accepted = false;
      Friend::create([
            'user_id' => $user,
            'friend_id' => $friend_id,
            'accepted' => $this->accepted,
        ]);


            $notifiedUser = User::findOrFail($friend_id);
            $notifiedUser->notify(new FriendRequest('send' , $user));    
        $this->showRequest($friend_id);
    }

    #[On('acceptFriend')]
    public function acceptFriend($friend_id) {

        $user  = Auth::id();
        $this->accepted = true;

        Friend::where('user_id' , $friend_id)->where('friend_id' , $user)->update(['accepted' => $this->accepted]);
        Friend::create([
            'user_id' => $user,
            'friend_id' => $friend_id,
            'accepted' => $this->accepted,
        ]);
    
        $notifiedUser = $friend_id;
        $notifiedUser->notify(new FriendRequest('accepted' , $user));
        $this->showRequest($friend_id);
        
    }

    #[On('removeFriend')]
    public function removeFriend($friend_id) {

        $user = Auth::id();

        $this->accepted = false;

        Friend::where('user_id' , $user)->where('friend_id' , $friend_id)->destroy();
        Friend::where('user_id' , $friend_id)->where('friend_id' , $user)->update(['accepted' => $this->accepted]);

        $notifiedUser = $friend_id;
        $notifiedUser->notify(new FriendRequest('removed' , $user));

        $this->showRequest($friend_id);


    }   
    public function showRequest($friend_id){

        $own_id = Auth::id();

        $friend = Friend::where('user_id', $own_id)->where('friend_id', $friend_id)->first();

        if ($friend) {
            if ($friend->accepted == true) {
                $this->status = "friended";
            } else {
                $this->status = "added";
            }
        } else {
            $friend = Friend::where('user_id', $friend_id)->where('friend_id', $own_id)->first();

            if ($friend) {
                $this->status = "waiting";
            } else {
                $this->status = "";
            }
        }

        $this->user = User::where('id', $friend_id)->first();

    }
    


    public function render()
    {
        Log::info('status: ' . $this->status);
        return view('livewire.friend-actions');
    }
}
