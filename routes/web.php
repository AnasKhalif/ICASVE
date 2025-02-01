<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpeakerController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/landing/pages/home');
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

Route::get('/', [SpeakerController::class, 'index']);

require __DIR__ . '/auth.php';
