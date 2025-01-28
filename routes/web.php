<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbstractUserController;

Route::get('/', function () {
    return "Welcome to Laravel 11";
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

// Route::get('/user', function () {
//     return request()->user();
// })->middleware(['auth'])->name('user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/abstract-user', [AbstractUserController::class, 'index'])
        ->name('abstract-user.index');

        Route::get('/abstract-user/add_abstract', [AbstractUserController::class, 'create'])
        ->name('add_abstract.create');    

    Route::post('/abstract-user', [AbstractUserController::class, 'store'])
        ->name('abstract-user.store');

    Route::get('/abstract-user/{id}', [AbstractUserController::class, 'show'])
        ->name('abstract-user.show');

    Route::get('/abstract-user/{id}/edit', [AbstractUserController::class, 'edit'])
        ->name('abstract-user.edit');

    Route::put('/abstract-user/{id}', [AbstractUserController::class, 'update'])
        ->name('abstract-user.update');

    Route::delete('/abstract-user/{id}', [AbstractUserController::class, 'destroy'])
        ->name('abstract-user.destroy');
});


require __DIR__ . '/auth.php';
