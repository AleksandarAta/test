<div class="h-full" x-data x-init= "

    new TomSelect('#detach', {
             maxItems: null,
    });
  new TomSelect('#attach', {
        maxItems: null,
       	plugins: {
		remove_button:{
			title:'Remove this item',
		},
        'clear_button':{
			'title':'Remove all selected options',
		},
        'checkbox_options': {
			'checkedClassNames':   ['ts-checked'],
			'uncheckedClassNames': ['ts-unchecked'],
		}
	},
    persist: false,
	create: false,
    }); 


" class="overflow-visible">
    <div class="flex flex-row flex-wrap -mx-4 items-stretch">
        <div class="w-full px-4">
            @if (session()->has('message'))
                <div class="text-green-500 font-bold text-lg md:text-2xl">
                    {{ session('message') }}
                </div>
            @endif
        </div>
    </div>  
    <form  wire:submit.prvent= "submit" class="p-3  w-2/3 justify-between">
        <div>
        <x-label class="block p-3" for="name">Name</x-label>
        <x-input class="block p-3 mb-3" type="text" id="name" name="name" wire:model="name"/>
        @error('name') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
    </div>
    <div >
        <label class="block p-3" for="detach">Remove company to the city</label>
        <select class="block p-3" name="detach" id="detach" multiple wire:model="attached_companies" >
            @foreach ($companies as $company )
                <option value="{{ $company->id }}">{{$company->name}}</option>
            @endforeach
        </select>
        @error('attached_companies') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
    </div>
        <x-button type="submit" class="block bg-blue-500 p-3 rounded text-white mt-4">Submit</x-button>
    </form>
</div>
