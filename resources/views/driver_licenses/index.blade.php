<x-app-layout>
    <div class="bg-white w-1/2 mx-auto py-2">
            <div class="   text-white w-40 text-center">
                <a href="{{ route  ('driver_licenses.create') }}" class="inline-block py-2 px-3 w-fill bg-blue-500 rounded">Create Driver License</a>
            </div>
            <div class = "p-3 mt-2">
                @foreach ($driver_licenses as $driver_license)
                    {{ $driver_license->user->name }}
                    {{ $driver_license->date_till }}

                    <br>
                @endforeach
            </div>
            {{-- <div class = "flex items-center flex-wrap px-3">
                {{ $driver_license->onEachside(0)}}
            </div> --}}
    </div>
</x-app-layout>