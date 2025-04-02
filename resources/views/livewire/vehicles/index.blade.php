<div class="p-3">
    <div name="searchBar" class="mb-4 relative flex justify-between">
        <form wire:submit.prevent class="border rounded mt-3 flex h-7">
            <img src="{{ Vite::asset('resources/images/icons8-search.svg') }}" alt="lupa" class=" block-inline w-5 h-7">
            <input wire:model.live="search" type="text" placeholder="search for vehicles ..."
                class=" w-fill p-2 focus:border-none focus:outline-none  border-none  h-7">
        </form>
        <a href="{{ route('vehicles.create') }}"
            class="border-blue-500 p-3 bg-blue-500 rounded text-white border my-2">Create a Vehicle</a>

        <div>

            <form>
                <label>Results per page</label>
                <select id="page_selected" wire:model="per_page_selected" name="page_selected" wire:change="$refresh">
                    @foreach ($per_page as $page )
                    <option value="{{ $page }}">{{ $page }} </option>
                    @endforeach
                </select>
            </form>
        </div>
    </div>
    <table class="table-auto border-collapse border border-blue-200 w-full">
        <thead>
            <tr>
                <th wire:click="orderBy('id')" class="border border-blue-200 cursor-pointer hover:bg-blue-100">ID</th>
                <th wire:click="orderBy('user')" class="border border-blue-200 cursor-pointer hover:bg-blue-100">Owner
                </th>
                <th wire:click="orderBy('brand')" class="border border-blue-200 cursor-pointer hover:bg-blue-100">Brand
                </th>
                <th wire:click="orderBy('model')" class="border border-blue-200 cursor-pointer hover:bg-blue-100">Model
                </th>
                <th class="border border-blue-200 ">VIN</th>
                <th class="border border-blue-200">Registration</th>
                <th class="border border-blue-200">Fuel</th>
                <th class="border border-blue-200">Actions</th>
            </tr>
        </thead>
        <tbody class="border border-blue-200">
            @foreach($vehicles as $vehicle)
            <tr>
                <td class="border border-blue-200 text-center">{{ $vehicle->id }}</td>
                <td class="border border-blue-200 text-center">
                    @if($vehicle->user)
                    {{ $vehicle->user->name}}
                    @else
                    <span>Yet to be purchesed</span>
                    @endif
                </td>
                <td class="border border-blue-200 text-center">{{ $vehicle->brand }}</td>
                <td class="border border-blue-200 text-center">{{ $vehicle->model }}</td>
                <td class="border border-blue-200 text-center">{{ $vehicle->vin }}</td>
                <td class="border border-blue-200 text-center">{{ $vehicle->registration }}</td>
                <td class="border border-blue-200 text-center">{{ $vehicle->fuel }}</td>
                <td class="border border-blue-200 text-center">
                    <a href="{{ route('vehicles.edit' , $vehicle->id) }}"
                        class="border-blue-500 p-0.5 bg-blue-500 rounded text-white border">Edit this Vehicle</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $vehicles->links() }}
</div>