<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<x-app-layout>
    <div class="bg-white w-1/2 mx-auto">
    <div class = "p-3 mt-2">
    @foreach ($users as $user)
        {{ $user->name }}
        <br>
    @endforeach
    </div>
    <div class = "flex items-center flex-wrap p-3">
    {{ $users->onEachside(0)}}
    </div>
</div>
</x-app-layout>

</body>
</html>