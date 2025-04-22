<div class="absolute right-0 bottom-0 z-50">
    @if (count($open))
        @foreach ($open as $op)
            <div class="w-80 border-2 border-red-300 bg-white rounded-lg float-right mr-3 mb-3">
                <h3 class="relative w-full text-center bg-red-300">
                    {{ $op['name'] }}
                    <button class="absolute top-0 right-0 h-4 w-4 mr-1 mt-1 border border-red-300 rounded focus:outline-none
                    bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                    wire:click="closeChat({{ $op['id'] . ', ' . $op['room_id'] }})">
                        <svg class="text-gray-800" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path></svg>
                    </button>
                </h3>
                <h3 class="w-full bg-red-300">
                    <button class="border border-red-300 rounded focus:outline-none m-1 ml-3 p-1
                    bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                    wire:click="startVoice({{ $op['id'] }}, '{{ $op['name'] }}' , {{ $op['room_id'] }})"
                    >
                        <svg class="h-4 w-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>
                    </button>

                    <button class="border border-red-300 rounded focus:outline-none m-1 ml-3 p-1
                    bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                    wire:click="startVideo({{ $op['id'] }}, '{{ $op['name'] }}' , {{ $op['room_id'] }})"
                    >
                        <svg class="h-4 w-4" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="video" class="svg-inline--fa fa-video fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M336.2 64H47.8C21.4 64 0 85.4 0 111.8v288.4C0 426.6 21.4 448 47.8 448h288.4c26.4 0 47.8-21.4 47.8-47.8V111.8c0-26.4-21.4-47.8-47.8-47.8zm189.4 37.7L416 177.3v157.4l109.6 75.5c21.2 14.6 50.4-.3 50.4-25.8V127.5c0-25.4-29.1-40.4-50.4-25.8z"></path></svg>
                    </button>
                </h3>
                @livewire('chat-body', ['op' => $op, 'last_message' => $last_message], key('chat-body-' . $op['id']))

            </div>
        @endforeach
    @endif
</div>
