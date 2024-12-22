<?php

use App\Http\Controllers\ProfileController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landing');
});


Route::get('/test', function () {
    return view('example');
});

Route::middleware('auth')->group(function () {
    //route ini hanya dapat di akses akun admin
    Route::get('/admin-only', function () {
        return "<h1>Hello admin!</h1>";
    })->middleware(AdminMiddleware::class);

    Route::get('/all-user', function () {
        return "<h1>Hello regular user!</h1>";
    });
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
