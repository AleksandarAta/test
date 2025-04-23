<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Message;
use Livewire\Component;
use App\Models\ChatRoom;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Auth;
use App\Notifications\MessageRequest;

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
        $id = $this->op['id'];
          $message = Message::create([
                'chat_room_id' => $room_id,
                'form' => $sender_id,
                'message' => $this->message,
                'read' => false
            ]);
                
            broadcast(new \App\Events\ChatUpdated($room_id, 'message', $this->message, $sender_id))->toOthers();
            
            $this->dispatch('message_sent', id:$id , message:$this->message);
            
            $notifiedUser = User::findOrFail($id);  
            $this->last_message->push($message);

            $notifiedUser->notify(new MessageRequest('Sent you a message' , $sender_id));
            // Message::where('chat_room_id', $room_id)->where('form', $id)->where('read', false)->update(['read' => true]);
            $this->message = "";
        }
        // #[On('sentLocal')]
        // public function sentLocal($message)
        // {
        //     // dd($message);
        //     $sender_id = Auth::id();
        //     broadcast(new \App\Events\ChatUpdated($this->op['room_id'], 'call', $message, $sender_id))->toOthers();
        // }

    public function render()
    {
        // dd($this->last_message);
        return view('livewire.chat-body');
    }
}
