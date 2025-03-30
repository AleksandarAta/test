<x-app-layout>
    @if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="text-white w-40 text-center mb-4">
                    <a href="{{ route('users.create') }}" class="inline-block py-2 px-3 w-fill bg-blue-500 rounded">
                        Create new user
                    </a>
                </div>

                <div class="p-3 mt-2 overflow-x-auto w-full text-center">
                    <table class="w-full bg-white rounded-lg shadow">
                        <thead class="bg-gray-800 text-white">
                            <tr>
                                <th class="px-4 py-3 ">Name</th>
                                <th class="px-4 py-3 ">Email</th>
                                <th class="px-4 py-3 ">Vehicles owned</th>
                                <th class="px-4 py-3 ">Actions</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-700">
                            @foreach ($users as $user)
                            <tr class="border-b border-gray-200 hover:bg-gray-50">
                                <td class="px-4 py-3">{{ $user->name }}</td>
                                <td class="px-4 py-3">{{ $user->email }}</td>
                                <td class="px-4 py-3">
                                    @if ($user->vehicles->count())
                                    {{ $user->vehicles->count() }}
                                    @else
                                    <span>No vehicle found</span>
                                    @endif

                                    {{-- @forelse($user->vehicles as $vehicle)
                                    {{-- @if(!$loop->last)|@endif
                                    @empty
                                    <span>No vehicles found</span>
                                    @endforelse --}}
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex items-center justify-center space-x-2">
                                        <a href="{{ route('users.show', $user) }}"
                                            class="text-white px-3 py-1 bg-blue-500 rounded hover:bg-blue-600">
                                            View
                                        </a>
                                        <form method="POST" action="{{ route('users.destroy', $user) }}" class="m-0">
                                            @csrf
                                            @method('delete')
                                            <button type="submit"
                                                class="text-white px-3 py-1 bg-red-500 rounded hover:bg-red-600">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="flex items-center flex-wrap px-3 mt-4">
                    {{ $users->onEachSide(0)->links() }}
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

</body>

</html>