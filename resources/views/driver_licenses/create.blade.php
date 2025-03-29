<x-app-layout>
    {{-- {{ dd($user->user->name) }} --}}
    <div class="bg-white mx-auto px-2 py-3">
    <form action="{{ route('driver_licenses.store') }}" method="POST" class="flex justify-center flex-wrap">
       @csrf
       <label for="date">Date</label>
       <x-input-error for="date"/>
       <x-input name="date" id="date" type="date"/> 
       <label for="date_till">Expiry date</label>
       <x-input-error for="email"/>
       <x-input name="date_till" id="date_till" type="date"/>
       <label for="password">Pearson</label>
       <select>
        @foreach ($users as $user)
            <option value="{{ $user->id }}">{{$user->name}}</option>
           
        @endforeach
       </select>
       <x-input-error for="password"/>
       <button type="submit" class="bg-blue-500 rounded ">Submit</button>
    </form>
</div>
</x-app-layout>