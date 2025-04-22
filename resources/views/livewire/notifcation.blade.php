<div>

    @if ($notification->count())
        <div class="bg-white overflow-hidden shadow-xl rounded-lg m-3 border-2 border-red-300 p-3">
            <span>{{$notification->count()}}</span>
            @foreach ($notification as $notification)
                @if ($notification['event'] == "added")
                    <div>
                        <span class="inline-block align-middle text-center">
                            User {{ $notification['name'] }} added you to friends list.
                        </span>
{{-- 
                        <button class="border border-red-300 rounded focus:outline-none
                        bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                        wire:click="showUser({{ $notification['friend_id'] }})">
                        Check user
                        </button> --}}

                        {{-- <button class="border border-red-300 rounded focus:outline-none
                        bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                        wire:click="readNotification('{{ $notification['id'] }}')">
                        Remove notification
                        </button> --}}
                    </div>
                @elseif ($notification['event'] == "accepted")
                    <div>
                        <span class="inline-block align-middle text-center">
                            User {{ $notification['name'] }} accepted your friend request.
                        </span>

                        {{-- <button class="border border-red-300 rounded focus:outline-none
                        bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                        wire:click="readNotification('{{ $notification['id'] }}')">
                        Remove notification
                        </button> --}}
                    </div>
                @endif
            @endforeach
        </div>
    @endif
</div>
