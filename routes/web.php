<?php

use Illuminate\Support\Facades\Route;
Use App\Http\Controllers\UserController;
Use App\Http\Controllers\DriverLicenseController;
use Faker\Guesser\Name;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
    Route::resource('users', UserController::class)->only('index', 'show', 'create', 'store', 'edit', 'update' , 'destroy');
    //olny('index', 'show', 'create', 'store', 'edit', 'update' , 'delete')
    Route::resource('driver_licenses', DriverLicenseController::class)->only('index' , 'store' , 'create', 'show', 'destroy');

    route::Get('/vehicles', [App\Http\Controllers\VehicleController::class, 'index'])->name('vehicles.index');
    route::Get('/vehicles/create', [App\Http\Controllers\VehicleController::class, 'create'])->name('vehicles.create');
    route::Get('/vehicles/{vehicle_id}/edit/', [App\Http\Controllers\VehicleController::class, 'edit'])->name('vehicles.edit');


});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');
