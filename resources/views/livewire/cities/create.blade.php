<div 
    x-data 
    x-init="
        new TomSelect('#companies', {
            maxItems: 5
        });
    "
>
    <form action="" wire:submit.prevent= "submit">
        <x-label for="name">City</x-label>
        <input type="text" name="name" id="name" wire:model ="name">
        @error('name') <span class="text-red-600 text-sm block pt-0.5">{{ $message }}</span> @enderror
        <select name="companies" id="companies" wire:model="companies" multiple wire:ignore>
            @foreach ($companies as $company)
                <option value="{{ $company->id }}">{{$company->name}}</option>
            @endforeach    
        </select>    
        <x-button type="submit">Submit</x-button>
    </form>
</div>
