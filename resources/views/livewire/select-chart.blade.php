<div  wire:ignore x-data x-init = "new TomSelect(
    document.querySelector('#select')
,{
	create: true,
	sortField: {
		field: 'text',
		direction: 'asc'
	}
});">
    <form action="" wire:submit = "submit" class="flex p-2 justify-between">
        <select id="select" class="w-1/3 h-1" wire:model = "value"  >
            <option value="/" selected disabled>...</option>
            <option value="pokemons">Pokemons</option>
            <option value="peoples">People</option>
            <option value="books">Books</option>
        </select>
         <button type="submit" class="py-3 px-5  bg-blue-500  text-white rounded">Submit</button>
    </form>
</div>
