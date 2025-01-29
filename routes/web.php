<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ViewerController;
use App\Http\Controllers\Admin\SymposiumController;
use App\Http\Controllers\AbstractController;

Route::get('/', function () {
    return "Welcome to Laravel 11";
});

Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('participant', 'UserController');
    Route::resource('reviewer', 'ViewerController');
    Route::resource('symposium', 'SymposiumController');
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

Route::middleware('auth')->group(function () {
    Route::resource('abstracts', AbstractController::class);
});

require __DIR__ . '/auth.php';
