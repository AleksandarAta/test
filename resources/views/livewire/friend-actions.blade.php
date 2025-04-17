    <div>
        @if ($user)            
        <div class="relative bg-white overflow-hidden shadow-xl rounded-lg m-3 border-2 border-red-300">
            <div class="col-span-5 bg-white overflow-hidden text-center p-3">
                @if ($status == "friended")
                                <button class="p-2 border border-red-300 rounded focus:outline-none
                                bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                                wire:click="removeFriend({{ $user->id }})">
                                Remove from friends
                                </button>
            @elseif ($status == "added")
                    <button class="p-2 border border-red-300 rounded focus:outline-none
                                bg-red-100" disabled>
                                Friend request sent
                                </button>
                @elseif ($status == "waiting")
                    <button class="p-2 border border-red-300 rounded focus:outline-none
                    bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                    wire:click="acceptFriend({{ $user->id }})">
                    Accept friendship
                    </button>
                @else
                    <button class="p-2 border border-red-300 rounded focus:outline-none
                        bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                        wire:click="addFriend({{ $user->id }})">
                        Send friend invitation
                    </button>
                @endif
            </div>
        </div>
        @endif
    <div>