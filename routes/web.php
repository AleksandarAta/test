<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\DriverLicenseController;

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
    Route::resource('users', UserController::class)->only('index', 'show', 'create', 'store', 'edit', 'update' , 'delete');
    //olny('index', 'show', 'create', 'store', 'edit', 'update' , 'delete')
    Route::resource('driver_licenses', DriverLicenseController::class)->only('index' , 'store' , 'create');
});

