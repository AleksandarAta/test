<div wire:ignore x-data x-init = "new TomSelect(
    document.querySelector('#select')
,{
	create: true,
	sortField: {
		field: 'text',
		direction: 'asc'
	}
});">
    <form action="" wire:submit = "submit">
        <select id="select" class="w-1/3" wire:model = "value" >
            <option value="pokemons">Pokemons</option>
            <option value="peoples">People</option>
            <option value="books">Books</option>
        </select>
         <button type="submit" class="py-3 px-5 my-1 mx-1 bg-blue-500  text-white rounded">Submit</button>
    </form>
</div>
