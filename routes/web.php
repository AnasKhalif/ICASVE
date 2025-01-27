<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ViewerController;

Route::get('/', function () {
    return "Welcome to Laravel 11";
});

Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('participants', 'UserController');
    Route::resource('reviewers', 'ViewerController');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/user', function () {
    return request()->user();
})->middleware(['auth'])->name('user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
