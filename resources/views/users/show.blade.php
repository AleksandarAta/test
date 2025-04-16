<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View user') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
                <div class="w-fill block">
                    <div class="flex flex-row flex-wrap -mx-4 items-stretch p-3">

                        <div class="w-full md:w-1/2 px-4 py-2 text-center">
                            <div class="inline-block rounded-full w-36 h-36">
                            @if($user->profile_photo_path)
                            <img src="{{ asset("storage/" . $user->profile_photo_path) }}" alt="" class="object-fit object-center w-full h-full rounded-full">
                            @else 
                            <img src="{{ $user->profile_photo_url }}" alt="" class="object-fit object-center w-full h-full rounded-full">
                            @endif
                            </div>
                        </div>
                        
                        <div class="w-full md:w-1/2 px-4 py-2">
                            <label class="block text-neutral-800 font-medium text-base mb-1" for="name">Name</label>
                            <input name="name" value="{{ $user->name }}" type="text" disabled id="name" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                        </div>
            
                        <div class="w-full md:w-1/2 px-4 py-2">
                            <label class="block text-neutral-800 font-medium text-base mb-1" for="email">Email</label>
                            <input name="email" value="{{ $user->email }}" type="text" disabled id="email" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                        </div>

                        <div class="w-full md:w-1/2 px-4 py-2">
                            <label class="block text-neutral-800 font-medium text-base mb-1" for="roles">Role</label>
                            <input type="text" id="roles" disabled class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-admin-main !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300" value="{{ ucfirst($user->getRoleNames()->implode(', ')) }}">
                        </div>

        
                        <div class="w-full md:w-1/2 px-4 py-2">
                            <label class="block text-neutral-800 font-medium text-base mb-1" for="dl_number">Driver license number</label>
                            @if ($user->driverLicense != null)
                            <input name="dl_number" value="{{ $user->driverLicense->dl_number }}" type="text" disabled id="password" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                            @else
                            <input name="dl_number" value="No driver license found" type="text" disabled id="password" class="w-full border-px border-gray-300 border-solid bg-white py-2 px-3 rounded-md shadow-sm min-h-[42px] placeholder:text-gray-500 text-black font-normal text-base leading-tight focus:border-blue-500 !ring-transparent disabled:text-black disabled:bg-gray-50 disabled:border-gray-300">
                            @endif
                        </div>
            
                        <div class="w-full px-4 py-2">
                            <div class="flex flex-row justify-between items-center w-full pt-2">
                                <div>
                                    @if ($user->driverLicense != null)
                                    {{-- <a href="{{ route('#', $user->driverLicense) }}" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-blue-500 bg-white text-base font-medium leading-tight hover:bg-blue-400 hover:border-blue-400 hover:text-white transition ease-in-out duration-200">View driver license</a> --}}
                                    @else
                                    <a href="#" disabled class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-blue-500 bg-white text-base font-medium leading-tight hover:bg-blue-100 hover:border-blue-400 hover:text-white transition ease-in-out duration-200">View driver license</a>
                                    @endif
                                </div>
            
                                <div>
                                    <button x-data x-on:click="$dispatch('addUser', { friend_id: {{ $user->id }} })" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 bg-blue-300 text-black text-base font-medium leading-tight hover:bg-blue-500 hover:border-blue-400 hover:text-white transition ease-in-out duration-200">start a chat</button>
                          
                                    <a href="{{ route('users.index') }}" class="inline-block text-center border border-blue-500 rounded-md min-h-[42px] h-auto py-2.5 p-5 text-blue-500 bg-white text-base font-medium leading-tight hover:bg-blue-400 hover:border-blue-400 hover:text-white transition ease-in-out duration-200">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
