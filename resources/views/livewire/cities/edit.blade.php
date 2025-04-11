<div class="h-full">
    <div class="flex flex-row flex-wrap -mx-4 items-stretch">
        <div class="w-full px-4">
            @if (session()->has('message'))
                <div class="text-green-500 font-bold text-lg md:text-2xl">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>  
    <form  wire:submit.prvent= "submit" class="w-full p-3">
        <x-label class="block p-3" for="name">Name</x-label>
        <x-input class="block p-3 mb-3" type="text" id="name" name="name" wire:model="name"/>
        @error('name') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
        <x-button type="submit" class="block bg-blue-500 p-3 rounded text-white">Submit</x-button>
    </form>
</div>
