<div>
    <div name="searchBar" class="mb-4 relative"> 
        <form wire:submit.prevent>
           <input wire:model.live="search" type="text"  placeholder="search for vehicles ..." class=" w-1/4 p-2 border rounded">
        </form>
    </div>
          <table class="table-auto border-collapse border border-blue-200 w-full">
        <thead>
            <tr>
                <th wire:click="order_by('brand')" class="border border-blue-200 cursor-pointer hover:bg-blue-100">Brand</th>
                <th wire:click="order_by('model')"  class="border border-blue-200 cursor-pointer hover:bg-blue-100">Model</th>
                <th class="border border-blue-200 ">VIN</th>
                <th class="border border-blue-200">Registration</th>
                <th wire:click="order_by('fuel')"  class="border border-blue-200 cursor-pointer hover:bg-blue-100">Fuel</th>
            </tr>
        </thead>
        <tbody class="border border-blue-200">
            @foreach($vehicles as $vehicle)
                <tr>
                    <td class="border border-blue-200 text-center">{{ $vehicle->brand }}</td>
                    <td class="border border-blue-200 text-center">{{ $vehicle->model }}</td>
                    <td class="border border-blue-200 text-center">{{ $vehicle->vin }}</td>
                    <td class="border border-blue-200 text-center">{{ $vehicle->registration }}</td>
                    <td class="border border-blue-200 text-center">{{ $vehicle->fuel }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
   {{ $vehicles->links() }}
</div>
