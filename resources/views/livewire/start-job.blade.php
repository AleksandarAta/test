<div x-data x-init="
    new TomSelect($refs.select,{
	maxItems: 3
});"  wire:ignore>
    <select multiple  x-ref="select" class="w-1/3 p-3 mx-2 my-2 inline-block">
        <option value="#">Pokemon</option>
        <option value="?">People</option>
        <option value="\">Sutff</option>
        <option value="|">Random</option>
    </select>
    <button type="button" wire:click="start_job()" class="inline-block bg-blue-500 text-white text-center p-3 mt-1 mx-2">Start Job</button>
</div>
