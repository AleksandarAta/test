<div class="absolute right-0 top-0 z-50 w-[200px] bg-white rounded border border-gray-200 p-5">
    {{-- {{ dd($user) }} --}}
    @if (count($user))
    <div class="bg-white overflow-hidden shadow-xl rounded-lg border-2 border-red-300 p-3">
        @foreach ($user as $friend)
        <div>
            @if ($friend['status'] == "online")
            <button class="relative inline-block text-left w-full px-2 pr-10 mb-1 border border-red-300 rounded focus:outline-none
                        bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                wire:click="startChat({{ $friend['id'] }}, '{{ $friend['name'] }}')">
                {{ $friend['name'] }}
                <svg class="w-4 h-4 fill-green-500 absolute right-1 top-1 svg-inline--fa fa-comment-alt fa-w-16"
                    aria-hidden="true" focusable="false" data-prefix="far" data-icon="comment-alt" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 7.1 5.8 12 12 12 2.4 0 4.9-.7 7.1-2.4L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zm16 352c0 8.8-7.2 16-16 16H288l-12.8 9.6L208 428v-60H64c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16h384c8.8 0 16 7.2 16 16v288z">
                    </path>
                </svg>
                @if ($friend['unread'] > 0)
                <span class="text-red-800 absolute right-6 top-0">
                    {{ $friend['unread'] }} 1
                </span>
                @endif
            </button>
            @else
            <button class="relative inline-block text-left w-full px-2 pr-10 mb-1 border border-red-300 rounded focus:outline-none
                        bg-red-300 hover:bg-red-200 active:bg-red-300 active:ring-2 active:ring-red-200"
                wire:click="startChat({{ $friend['id'] }}, '{{ $friend['name'] }}')"
                >
                {{ $friend['name'] }}
                <svg class="w-4 h-4 fill-red-400 absolute right-1 top-1" aria-hidden="true" focusable="false"
                    data-prefix="far" data-icon="comment-alt" class="svg-inline--fa fa-comment-alt fa-w-16" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <path
                        d="M448 0H64C28.7 0 0 28.7 0 64v288c0 35.3 28.7 64 64 64h96v84c0 7.1 5.8 12 12 12 2.4 0 4.9-.7 7.1-2.4L304 416h144c35.3 0 64-28.7 64-64V64c0-35.3-28.7-64-64-64zm16 352c0 8.8-7.2 16-16 16H288l-12.8 9.6L208 428v-60H64c-8.8 0-16-7.2-16-16V64c0-8.8 7.2-16 16-16h384c8.8 0 16 7.2 16 16v288z">
                    </path>
                </svg>
                @if ($friend['unread'] > 0)
                <span class="text-red-800 absolute right-6 top-0">
                    {{ $friend['unread'] }}
                </span>
                @endif
            </button>
            @endif
        </div>
        @endforeach
    </div>
    @endif
</div>