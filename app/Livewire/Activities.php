<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Friend;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Notifications\FriendRequest;
use Illuminate\Support\Facades\Auth;

class Activities extends Component
{
    public $status = '';
    public $user = '';


    #[On('addUser')]
    public function addUser($friend_id)
    {
        $notify_user = User::find($friend_id);

        $own_id= Auth::id();
        $accepted = false;

        if ($this->status == '') {
            Friend::create([
                'user_id' => $own_id,
                'friend_id' => $friend_id,
                'accepted' => $accepted,
            ]);

            $notify_user->notify(new FriendRequest("added", $own_id));
        }
        $this->showUser($friend_id);
        }

        public function acceptFriend($friend_id){

            $notify_user = User::find($friend_id);

            $own_id= Auth::id();
            $accepted = true;

            if($this->status == 'waiting') {
                Friend::create([
                    'user_id' => $own_id,
                    'friend_id' => $friend_id,
                    'accepted' => $accepted,
                ]);
            }

            Friend::where('user_id', $friend_id)->where('friend_id' , $own_id)->update(['accepted' => $accepted]);

            $notify_user->notify(new FriendRequest('accepted' , $own_id));
                
            $this->showUser($friend_id);
        }

        public function removeFriend($friend_id) {

            $notify_user = User::find($friend_id);
            $own_id= Auth::id();

            $accepted = false;

            if($this->status == 'added'){
                Friend::where('user_id', $own_id)->where('friend_id' , $friend_id)->destroy();
            
                Friend::where('friend_id', $own_id)->where('user_id' , $friend_id)->update(['accepted' => $accepted]);
    
    
                $notify_user->notify(new FriendRequest('removed' ,$friend_id));
            }             


            $this->showUser($friend_id);
        }

        public function showUser($friend_id)
        {
            $own_id= Auth::id();
    
            $friend = Friend::where('user_id', $own_id)->where('friend_id', $friend_id)->first();
    
            if ($friend) {
                if ($friend->accepted == true) {
                    $this->status = "friended";
                } else {
                    $this->status = "added";
                }
            } else {
                $friend = Friend::where('own_id', $friend_id)->where('friend_id', $own_id)->first();
    
                if ($friend) {
                    $this->status = "waiting";
                } else {
                    $this->status = "";
                }
            }
    
            $this->user = User::select('id', 'name', 'profile_photo_path')->where('id', $friend_id)->first();
        }
    

    public function render()
    {
        return view('livewire.activities');
    }
}
