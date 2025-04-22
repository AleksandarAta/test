<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;

use App\Models\ChatRoom;
use App\Models\Friend;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class UsersList extends Component
{
    public $here;
    public $user_list;
   public $users;

    public function mount()
    {
        $here = collect($this->here);
        $user_id = Auth::id();
        $friends = Friend::where('user_id' , $user_id)->get();
        $this->users = collect();

        foreach($friends as $friend) {
            $user = User::FindOrFail($friend->friend_id);
            $this->users->push($user);

        }   
        // dd($this->users);
        $this->user_list = collect();
        foreach ($this->users as $user) {

            $participants = [$user->id, $user_id];
            $room_id_data = ChatRoom::whereJsonContains('participants', $participants)->first();
            if ($room_id_data != null) {
                $room_id = $room_id_data->id;
                $unread = Message::where('chat_room_id', $room_id)->where('form', $user->id)->where('read', false)->get()->count();
            } else {
                $unread = 0;
            }
            if ($here->contains('id', $user->id)) {
                $status = 'online';
            } else {
                $status = 'offline';
            }

            $this->user_list->push([
                'id' => $user->id,
                'name' => $user->name,
                'unread' => $unread,
                'status' => $status
            ]);
        }
    }


    #[On('echo-presence:global,here')]
    public function here($here)
    {

        Log::info("Presence users:", ['here' => $here]);


        $this->here = collect($here);
        

        $this->user_list = collect($this->user_list);

        $new_user_list = collect();

        foreach ($this->user_list as $user) {
            if ($this->here->contains('id', $user['id'])) {
                $status = 'online';
            } else {
                $status = 'offline';
            }
            $new_user_list->push([
                'id' => $user['id'],
                'name' => $user['name'],
                'status' => $status,
                'unread' => $user['unread'],

            ]);
        }

        $this->user_list = $new_user_list;
    }

    #[On('echo-presence:global,joining')]
    public function joining($joining)
    {
        $this->here = collect($this->here);
        $this->here->push($joining);

        $this->user_list = collect($this->user_list);

        $new_user_list = [];
        $new_user_list = collect($new_user_list);

        foreach ($this->user_list as $friend) {

            if ($this->here->contains('id', $friend['id'])) {
                $status = "online";
            } else {
                $status = "offline";
            }

            $new_user_list->push([
                'id'  => $friend['id'],
                'name' => $friend['name'],
                'status' => $status,
                'unread' => $friend['unread']
            ]);
        }
        $this->user_list = $new_user_list;
    }
    #[On('echo-presence:global,leaving')]
    public function leaving($leaving)
    {
        $this->here = collect($this->here);
        $id = $leaving['id'];
        $name = $leaving['name'];
        $this->here = $this->here->reject(function ($value) use ($id, $name) {
            if ($value['id'] == $id && $value['name'] == $name) {
                return true;
            } else {
                return false;
            }
        });

        $this->user_list = collect($this->user_list);

        $new_user_list = [];
        $new_user_list = collect($new_user_list);

        foreach ($this->user_list as $friend) {

            if ($this->here->contains('id', $friend['id'])) {
                $status = "online";
            } else {
                $status = "offline";
            }

            $new_user_list->push([
                'id'  => $friend['id'],
                'name' => $friend['name'],
                'status' => $status,
                'unread' => $friend['unread']
            ]);
        }
        $this->user_list = $new_user_list;
    }

    // public function friendAdded()
    // {
    //     $this->user_list = [];

    //     $this->user_list = collect($this->user_list);

    //     $this->here = collect($this->here);

    //     $own_id = Auth::id();

    //     $friends = Friend::where('own_id', $own_id)->where('accepted', true)->orderBy('updated_at', 'desc')->get();

    //     foreach ($friends as $friend) {
    //         $name = User::find($friend->friend_id)->name;

    //         $participants = [$friend->friend_id, $own_id];
    //         $room_id_all = ChatRoom::whereJsonContains('participants', $participants)->first();
    //         if ($room_id_all != null) {
    //             $room_id = $room_id_all->id;
    //             $unread = Message::where('chat_room_id', $room_id)->where('form', $friend->friend_id)->where('read', false)->get()->count();
    //         } else {
    //             $unread = 0;
    //         }

    //         if ($this->here->contains('id', $friend->friend_id)) {
    //             $status = "online";
    //         } else {
    //             $status = "offline";
    //         }

    //         $this->user_list->push([
    //             'id'  => $friend->friend_id,
    //             'name' => $name,
    //             'status' => $status,
    //             'unread' => $unread
    //         ]);
    //     }
    // }

    public function readMessages($id)
    {
        $this->user_list = collect($this->user_list);

        $new_user_list = [];
        $new_user_list = collect($new_user_list);

        foreach ($this->user_list as $friend) {

            if ($id == $friend['id']) {
                $unread = 0;
            } else {
                $unread = $friend['unread'];
            }

            $new_user_list->push([
                'id'  => $friend['id'],
                'name' => $friend['name'],
                'status' => $friend['status'],
                'unread' => $unread
            ]);
        }
        $this->user_list = $new_user_list;
    }

    public function gotMessage($friend_id)
    {
        $this->user_list = collect($this->user_list);

        $new_user_list = [];
        $new_user_list = collect($new_user_list);

        foreach ($this->user_list as $friend) {
            if ($friend_id == $friend['id']) {
                $unread = $friend['unread'] + 1;
            } else {
                $unread = $friend['unread'];
            }

            $new_user_list->push([
                'id'  => $friend['id'],
                'name' => $friend['name'],
                'status' => $friend['status'],
                'unread' => $unread
            ]);
        }
        $this->user_list = $new_user_list;
    }
    #[On('startChat')]
    public function startChat($id , $name){
        $this->dispatch('startChat', $id , $name)->to(Chat::class);
    }

    public function render()
    {
        return view('livewire.users-list', [
            'user' => $this->user_list,
        ]);
    }
}
