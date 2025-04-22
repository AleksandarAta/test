<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Models\ChatRoom;
use Illuminate\Support\Facades\Auth;

class ChatBody extends Component
{
    public $op;
    public $message = '';
    public $last_message;
    public $messages = [];

    public function sendMessage()
    {
        
        $room_id = $this->op['room_id'];
        $sender_id = Auth::id();
      

          $message = Message::create([
                'chat_room_id' => $room_id,
                'form' => $sender_id,
                'message' => $this->message,
                'read' => false
            ]);
                
            broadcast(new \App\Events\ChatUpdated($room_id, 'message', $this->message, $sender_id))->toOthers();

            
            // dd($message_and_room);

            // Message::where('chat_room_id', $room_id)->where('form', $id)->where('read', false)->update(['read' => true]);
            $this->message = "";
        }

    // public function sentLocal($message)
    // {
    //     $sender_id = Auth::id();
    //     broadcast(new \App\Events\ChatUpdated($this->op['room_id'], 'call', $message, $sender_id))->toOthers();
    // }

    public function render()
    {
        
        return view('livewire.chat-body');
    }
}
