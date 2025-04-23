<div>
    @if ($user)
        <div class="relative bg-white overflow-hidden shadow-xl rounded-lg m-3 border-2 border-red-300">
            <h5 class="w-full text-center bg-red-300">
                {{ __('User options') }}
            </h5>
            <button class="absolute top-0 right-0 h-4 w-4 mr-1 mt-1" wire:click="close()">
                <svg class="text-gray-800" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path></svg>
            </button>
            <div class="grid grid-cols-5 mx-auto">
                <div class="col-span-5 bg-white overflow-hidden mx-auto p-3">
                    @if ($user->profile_photo_path)
                        <img class="w-32 h-32 rounded-full object-cover" src="{{ asset('storage/' . $user->profile_photo_path) }}" alt="{{ $user->name }}"/>
                    @else
                        <svg class="w-32 h-32 rounded-full object-cover text-red-300" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="question-circle" class="svg-inline--fa fa-question-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M504 256c0 136.997-111.043 248-248 248S8 392.997 8 256C8 119.083 119.043 8 256 8s248 111.083 248 248zM262.655 90c-54.497 0-89.255 22.957-116.549 63.758-3.536 5.286-2.353 12.415 2.715 16.258l34.699 26.31c5.205 3.947 12.621 3.008 16.665-2.122 17.864-22.658 30.113-35.797 57.303-35.797 20.429 0 45.698 13.148 45.698 32.958 0 14.976-12.363 22.667-32.534 33.976C247.128 238.528 216 254.941 216 296v4c0 6.627 5.373 12 12 12h56c6.627 0 12-5.373 12-12v-1.333c0-28.462 83.186-29.647 83.186-106.667 0-58.002-60.165-102-116.531-102zM256 338c-25.365 0-46 20.635-46 46 0 25.364 20.635 46 46 46s46-20.636 46-46c0-25.365-20.635-46-46-46z"></path></svg>
                    @endif
                </div>
                <div class="col-span-5 bg-white overflow-hidden text-center">
                    <span>
                        {{ $user->name }}
                    </span>
                </div>
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
        </div>
  
    @endif
</div>

