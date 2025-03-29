<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
@if(session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<x-app-layout>
    <div class="bg-white w-1/2 mx-auto py-2">
        <div class="   text-white w-40 text-center">
            <a href="{{ route  ('users.create') }}" class="inline-block py-2 px-3 w-fill bg-blue-500 rounded">Create new user</a>
        </div>
        <div class = "p-3 mt-2">
            @foreach ($users as $user)
                 {{ $user->name }} | <a href="{{ route('users.show', ['user' => $user]) }}" class="text-white inline-block py-2 px-3 w-fill bg-blue-500 rounded">View user</a>
                <br>
            @endforeach
        </div>
        <div class = "flex items-center flex-wrap px-3">
            {{ $users->onEachside(0)}}
        </div>
</div>
</x-app-layout>

</body>
</html>