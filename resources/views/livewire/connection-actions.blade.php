<div>
@if ($call)
    @if ($call == 'voice')
        <div class="relative bg-white overflow-hidden shadow-xl rounded-lg m-3 border-2 border-red-300">
            <h5 class="w-full text-center bg-red-300">
                Voice call with {{ $call_with }}
            </h5>
            <button class="absolute top-0 right-0 h-4 w-4 mr-1 mt-1 border border-red-300 rounded focus:outline-none
            bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
            wire:click="closeCall()">
                <svg class="text-gray-800" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path></svg>
            </button>
            <audio id='local' autoplay muted wire:init="voiceReady">
            </audio>
            <audio id='remote' autoplay>
            </audio>
            <button id="mute" class="absolute top-0 right-5 h-4 w-4 mr-1 mt-1 border border-red-300 rounded focus:outline-none
            bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
            onclick="toggleMute()">
                <svg class="text-gray-800" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="volume-mute" class="svg-inline--fa fa-volume-mute fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M215.03 71.05L126.06 160H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V88.02c0-21.46-25.96-31.98-40.97-16.97zM461.64 256l45.64-45.64c6.3-6.3 6.3-16.52 0-22.82l-22.82-22.82c-6.3-6.3-16.52-6.3-22.82 0L416 210.36l-45.64-45.64c-6.3-6.3-16.52-6.3-22.82 0l-22.82 22.82c-6.3 6.3-6.3 16.52 0 22.82L370.36 256l-45.63 45.63c-6.3 6.3-6.3 16.52 0 22.82l22.82 22.82c6.3 6.3 16.52 6.3 22.82 0L416 301.64l45.64 45.64c6.3 6.3 16.52 6.3 22.82 0l22.82-22.82c6.3-6.3 6.3-16.52 0-22.82L461.64 256z"></path></svg>
            </button>
            <button id="unmute" style="visibility:hidden;" class="absolute top-0 right-5 h-4 w-4 mr-1 mt-1 border border-red-300 rounded focus:outline-none
            bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
            onclick="toggleMute()">
                <svg class="text-gray-800" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="volume-up" class="svg-inline--fa fa-volume-up fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M215.03 71.05L126.06 160H24c-13.26 0-24 10.74-24 24v144c0 13.25 10.74 24 24 24h102.06l88.97 88.95c15.03 15.03 40.97 4.47 40.97-16.97V88.02c0-21.46-25.96-31.98-40.97-16.97zm233.32-51.08c-11.17-7.33-26.18-4.24-33.51 6.95-7.34 11.17-4.22 26.18 6.95 33.51 66.27 43.49 105.82 116.6 105.82 195.58 0 78.98-39.55 152.09-105.82 195.58-11.17 7.32-14.29 22.34-6.95 33.5 7.04 10.71 21.93 14.56 33.51 6.95C528.27 439.58 576 351.33 576 256S528.27 72.43 448.35 19.97zM480 256c0-63.53-32.06-121.94-85.77-156.24-11.19-7.14-26.03-3.82-33.12 7.46s-3.78 26.21 7.41 33.36C408.27 165.97 432 209.11 432 256s-23.73 90.03-63.48 115.42c-11.19 7.14-14.5 22.07-7.41 33.36 6.51 10.36 21.12 15.14 33.12 7.46C447.94 377.94 480 319.54 480 256zm-141.77-76.87c-11.58-6.33-26.19-2.16-32.61 9.45-6.39 11.61-2.16 26.2 9.45 32.61C327.98 228.28 336 241.63 336 256c0 14.38-8.02 27.72-20.92 34.81-11.61 6.41-15.84 21-9.45 32.61 6.43 11.66 21.05 15.8 32.61 9.45 28.23-15.55 45.77-45 45.77-76.88s-17.54-61.32-45.78-76.86z"></path></svg>
            </button>
        </div>
    @elseif ($call == 'video')
        <div class="relative bg-white overflow-hidden shadow-xl rounded-lg m-3 border-2 border-red-300">
            <h5 class="w-full text-center bg-red-300">
                Video call with {{ $call_with }}
            </h5>
            <button class="absolute top-0 right-0 h-4 w-4 mr-1 mt-1 border border-red-300 rounded focus:outline-none
            bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
            wire:click="closeCall()">
                <svg class="text-gray-800" aria-hidden="true" focusable="false" data-prefix="far" data-icon="times-circle" class="svg-inline--fa fa-times-circle fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 448c-110.5 0-200-89.5-200-200S145.5 56 256 56s200 89.5 200 200-89.5 200-200 200zm101.8-262.2L295.6 256l62.2 62.2c4.7 4.7 4.7 12.3 0 17l-22.6 22.6c-4.7 4.7-12.3 4.7-17 0L256 295.6l-62.2 62.2c-4.7 4.7-12.3 4.7-17 0l-22.6-22.6c-4.7-4.7-4.7-12.3 0-17l62.2-62.2-62.2-62.2c-4.7-4.7-4.7-12.3 0-17l22.6-22.6c4.7-4.7 12.3-4.7 17 0l62.2 62.2 62.2-62.2c4.7-4.7 12.3-4.7 17 0l22.6 22.6c4.7 4.7 4.7 12.3 0 17z"></path></svg>
            </button>
            <video id='local' class="absolute z-30 left-2 top-8 w-32" autoplay muted wire:init="videoReady">
            </video>
            <video id='remote' autoplay>
            </video>
        </div>
    @elseif ($call == 'ringing')
        @if ($call_type == 'voice')
            <div class="bg-white overflow-hidden shadow-xl rounded-lg m-3 border-2 border-red-300">
                <h5 class="w-full text-center bg-red-300">
                    Voice call from {{ $call_with }}
                </h5>
                {{-- {{ dd($call_id) }} --}}
                <div class="text-center">
                    <button class="border border-red-300 rounded focus:outline-none m-1 p-1
                    bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                    wire:click="startVoice({{ $call_id }}, '{{ $call_with }}' , 'answer')"
                    >
                        <svg class="h-16 w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="phone" class="svg-inline--fa fa-phone fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M493.4 24.6l-104-24c-11.3-2.6-22.9 3.3-27.5 13.9l-48 112c-4.2 9.8-1.4 21.3 6.9 28l60.6 49.6c-36 76.7-98.9 140.5-177.2 177.2l-49.6-60.6c-6.8-8.3-18.2-11.1-28-6.9l-112 48C3.9 366.5-2 378.1.6 389.4l24 104C27.1 504.2 36.7 512 48 512c256.1 0 464-207.5 464-464 0-11.2-7.7-20.9-18.6-23.4z"></path></svg>
                    </button>
                </div>
                <audio id="ring" autoplay loop>
                    <source src="{{ ('storage/call.mp3') }}" type="audio/mpeg">
                </audio>
            </div>
        @elseif ($call_type == 'video')
            <div class="bg-white overflow-hidden shadow-xl rounded-lg m-3 border-2 border-red-300">
                <h5 class="w-full text-center bg-red-300">
                    Video call from {{ $call_with }}
                </h5>
                <div class="text-center">
                    <button class="border border-red-300 rounded focus:outline-none m-1 p-1
                    bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                    wire:click="startVideo({{ $call_id }}, '{{ $call_with }}' , 'answer')"
                    >
                        <svg class="h-16 w-16" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="video" class="svg-inline--fa fa-video fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M336.2 64H47.8C21.4 64 0 85.4 0 111.8v288.4C0 426.6 21.4 448 47.8 448h288.4c26.4 0 47.8-21.4 47.8-47.8V111.8c0-26.4-21.4-47.8-47.8-47.8zm189.4 37.7L416 177.3v157.4l109.6 75.5c21.2 14.6 50.4-.3 50.4-25.8V127.5c0-25.4-29.1-40.4-50.4-25.8z"></path></svg>
                    </button>
                </div>
                <audio id="ring" autoplay loop>
                    <source src="{{ ('storage/call.mp3') }}" type="audio/mpeg">
                </audio>
            </div>
        @endif
    @endif
    @endif

</div>
