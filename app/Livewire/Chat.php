<?php

namespace App\Livewire;

use App\Models\ChatRoom;
use App\Models\Message;
use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;

class Chat extends Component
{

    public $open;
    public $last_message;

    #[On('startChat')]
    public function startChat($id, $name)
    {
        $this->open = collect();
        $participants = [$id, Auth::id()];

        $room_id_data = ChatRoom::whereJsonContains('participants', $participants);

        if ($room_id_data == null) {
            ChatRoom::create([
                'participants' => json_encode($participants),
            ]);
        }
        $room_id = $room_id_data->id;
     if(!$this->open->contains('id' , $id) && count($this->open) <= 3){
        $this->open->push([
            'id' => $id,
            'name' => $name,
            'room_id' => $room_id;
        ]);

        // $unread_messeges = Message::where('chat_room_id' , $room_id)->where('from', $id)->where('read', false)->get();
        $this->last_message = Message::where('chat_room_id', $room_id)->latest()->limit(50)->get()->reverse();
    }
}
    public function closeChat($id, $room_id){
        $this->open = collect();

        $this->open->reject(function($value) use ($id){
            if($value['id'] == $id){
                return true;
            }
            else {
                return false;
            }
        });
    }
    public function checkIfOpen($friend_id) {
         
         
    }
    
    public function render()
    {
        return view('livewire.chat');
    }
}
