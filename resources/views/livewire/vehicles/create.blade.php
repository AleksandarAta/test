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
                    <button type="submit" class="bg-blue-500 rounded p-3">Submit</button>
                </form>
            </div>
        </div>
    </div>

</div>