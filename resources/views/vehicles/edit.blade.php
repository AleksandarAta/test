<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit vehicles') }}
        </h2>
    </x-slot>
  
        <form action="{{ route('vehicles.create') }}" method="GET">
    <x-button type='submit'>Create new vehicle</x-button>
    </form>
</x-app-layout>
