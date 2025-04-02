<div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white mx-auto px-2 py-3">
                <form action="{{ route('users.store') }}" wire:submit.prevent="submit"
                    class="flex justify-center flex-wrap">
                    @csrf
                    <div class="w-full">
                        <label for="name">Select a user</label>
                        <br>
                        <x-input-error for="user" />
                        <select wire:model='user' name="selected_user" id="selected_user">
                            <option value="">...</option>
                            @foreach ($users as $user )
                            <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="w-full">
                        <label for="brand">Brand</label>
                        <br>
                        <x-input-error for="brand" />
                        <x-input name="brand" id="brand" wire:model='brand' type="text" />
                    </div>
                    <div class="w-full">
                        <label for="model">Model</label>
                        <br>
                        <x-input-error for="model" />
                        <x-input name="model" id="model" wire:model='model' type="text" />
                    </div>
                    <div class="w-full">
                        <label for="registration">Registration</label>
                        <br>
                        <x-input-error for="registration" />
                        <x-input name="registration" id="registration" wire:model='registration' type="text" />
                    </div>
                    <div class="w-full">
                        <label for="vin">VIN</label>
                        <br>
                        <x-input-error for="vin" />
                        <x-input name="vin" id="vin" wire:model='vin' type="text" />
                    </div>
                    <div class="w-full">
                        <label for="fuel">Fuel</label>
                        <br>
                        <x-input-error for="fuel" />
                        <x-input name="fuel" id="fuel" wire:model='fuel' type="text" />
                    </div>
                    <div class="w-full md:w-1/2 px-4 py-2">
                        <label class="block text-neutral-800 font-medium text-base mb-1" for="image">Image</label>
                        <input type="file" id="image" wire:model="image" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                        @error('image') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
                    </div>
                    <div>
          
    
                               
                    <div class="w-full px-4 py-2">
                        @if ($image)                
                            Image Preview:
                            <img src="{{ $image->temporaryUrl() }}" class="mx-auto">                
                        @endif
                    </div>
                    <button type="submit" class="bg-blue-500 rounded p-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>