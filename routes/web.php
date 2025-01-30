<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewerController;
use App\Http\Controllers\Admin\SymposiumController;
use App\Http\Controllers\AbstractController;
use App\Http\Controllers\Admin\SummaryController;
use App\Http\Controllers\FullPaperController;

Route::get('/', function () {
    return "Welcome to Laravel 11";
});

Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('participant', 'UserController');
    Route::resource('reviewer', 'ReviewerController');
    Route::resource('symposium', 'SymposiumController');
    Route::get('summary', [SummaryController::class, 'index'])->name('summary');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::resource('abstracts', AbstractController::class);
    Route::get('abstracts/{id}/download-pdf', [AbstractController::class, 'downloadPdf'])->name('abstracts.downloadPdf');
    Route::get('create/{abstractId}', [FullPaperController::class, 'create'])->name('fullpapers.create');
    Route::post('store/{abstractId}', [FullPaperController::class, 'store'])->name('fullpapers.store');
});

Route::get('/user', function () {
    return request()->user();
})->middleware(['auth'])->name('user');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
