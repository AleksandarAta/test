<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::resource('users', UserController::class)->except('create', 'store');
    //olny('index', 'show', 'create', 'store', 'edit', 'update' , 'delete')
    Route::resource('driver-licenses', DriverLicenseController::class);
});

