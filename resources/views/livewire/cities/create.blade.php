<div 
>
@if ($loading)
    <form action="" wire:submit.prevent= "submit" >
        @switch( $i )
            @case('newCity')
                <input type="hidden" wire:model= "i" value="newCity">
                <x-label for="name">City</x-label>
                <input type="text" name="name" id="name" wire:model ="name">
                @error('name') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
                @break
            @case('addCompanies')
        <input type="hidden" wire:model= "i" value="addCompanies">
        <div wire:ignore>
        <select name="selected_city" id="selected_city" wire:model='selected_city' x-init = "const ts = new TomSelect($el ,{ sortField: {
		field: 'text',
        
	}}) " class="overflow-visible" >
            <option value="#"  selected  >...</option>
            @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{$city->name}}</option>
            @endforeach
        </select>
    </div>
        @error('selected_city') <span class="text-red-600 text-sm block pt-0.5">Please Select A City from the list </span> @enderror

        @endswitch
        <div wire:ignore>
        <select name="companies" id="companies" wire:model="selected_companies" multiple   class="w-1/3" x-init = "const ts = new TomSelect($el , { maxItems: 3,  }) " 
        >
            @foreach ($companies as $company)
                <option  value="{{ $company->id }}">{{$company->name}}</option>
            @endforeach    
        </select>  
    </div>  
        @error('selected_companies') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror

        <x-button type="submit">Submit</x-button>
    </form>
@endif
</div>
@script
<script>


document.addEventListener('livewire:load', () => {
    console.log('hellow');
    });

    Livewire.hook('message.processed', () => {
        new TomSelect('#companies', { maxItems: 5 });
   });



</script>
@endscript
