<div class="w-full p-3">
    <div id="chat-{{ $op['id'] }}" class="h-80 w-full overflow-y-auto bg-gray-100 border-2 border-red-300 p-3">
         @foreach ($last_message as $message)  
            {{-- <span>{!! $message->message !!}</span> --}}
            <p>{!! $message->message !!}</p>
         @endforeach
    </div>
    <div>
        <form wire:submit.prevent = "sendMessage">
        <input 
            type="text" wire:model="message" >
        <button type="submit">submit</button>
        </form>
    </div>
</div>

