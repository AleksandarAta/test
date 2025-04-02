<?php

use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Models\Blog;

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

    Route::resource('blogs', BlogController::class)->only('index', 'create');

    Route::post("/upload", [BlogController::class, 'upload'])->name('upload.image');
});


Route::get('blog/list', [BlogController::class, 'list'])->name('all.blogs');
Route::get('blog/{slug}', [BlogController::class, 'list_blog'])->name('list.blog');
