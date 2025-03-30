<x-app-layout>
    <div class="bg-white mx-auto px-2 py-3">
        <form action="{{ route('driver_licenses.store') }}" method="POST" class="flex justify-center flex-wrap">
            @csrf
            <label for="date">Date</label>
            <x-input-error for="date" />
            <x-input name="date" id="date" type="date" x-data x-init="flatpickr($refs.input, {
            enableTime: true,
            dateFormat: 'Y-m-d H:i',
            maxDate: 'today',
            defaultDate: '{{ now()->format('Y-m-d H:i') }}',
            time_24hr: true
        })" x-ref="input" /> <label for="selected_user">Pearson</label>
            <select name="selected_user" id="selected_user">
                @foreach ($users as $user)
                <option value="{{ $user->id }}">{{$user->name}}</option>
                @endforeach
            </select>
            <x-input-error for="selected_user" />
            <x-button type="submit" class="bg-blue-500 rounded ">Submit</x-button>
        </form>
    </div>
</x-app-layout>