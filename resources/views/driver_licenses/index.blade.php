<x-app-layout>
    <div class="bg-white w-1/2 mx-auto py-2">
            <div class="   text-white w-40 text-center">
                <a href="{{ route  ('driver_licenses.create') }}" class="inline-block py-2 px-3 w-fill bg-blue-500 rounded">Create Driver License</a>
            </div>
            <div class = "p-3 mt-2">
                @if (session( 'message'))
                    <div class="alert text-green-500">
                        {{ session('message') }}
                    </div>
                @endif
                @foreach ($driver_licenses as $driver_license)
                @if($driver_license->user != null)
                    {{ $driver_license->user->name }} |
                @else 
                <span>No pearson assinged</span>
                @endif
                    {{ $driver_license->date}} |
                    {{ $driver_license->date_till }} |
                <a href="{{ route  ('driver_licenses.show', ['driver_license' => $driver_license]),  }}" class="inline-block py-2 px-3 w-fill bg-blue-500 rounded">Create Driver License</a>
                    
                 | <form method="POST" action="{{ route('driver_licenses.destroy', $driver_license)  }}">
                    @csrf
                    @method('delete')
                    <x-button class="bg-blue-500 rounded" type='submit'>Delete Driver license</x-button>
                </form>
                    <br>
                @endforeach
            </div>
            {{-- <div class = "flex items-center flex-wrap px-3">
                {{ $driver_license->onEachside(0)}}
            </div> --}}
    </div>
</x-app-layout>