<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <x-app-layout>
        <div class="bg-white mx-auto px-2 py-3">
        <form action="{{ route('users.store') }}" method="POST" class="flex justify-center flex-wrap">
           @csrf
           <label for="name">First name</label>
           <x-input-error for="name"/>
           <x-input name="name" id="name" type="text" /> 
           <label for="email">Email</label>
           <x-input-error for="email"/>
           <x-input name="email" id="email" type="email"/>
           <label for="password">Password</label>
           <x-input name="password" id="password" type="password"/>
           <x-input-error for="password"/>
           <button type="submit" class="bg-blue-500 rounded ">Submit</button>
        </form>
    </div>
    </x-app-layout>
</body>
</html>