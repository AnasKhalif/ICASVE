<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ReviewerController;
use App\Http\Controllers\Admin\SymposiumController;
use App\Http\Controllers\AbstractController;
use App\Http\Controllers\Admin\SummaryController;
use App\Http\Controllers\FullPaperController;
use App\Http\Controllers\Reviewer\SummaryReviewerController;
use App\Http\Controllers\FilePaymentController;
use App\Http\Controllers\Reviewer\EditorController;
use App\Http\Controllers\Reviewer\ReviewController;

Route::get('/', function () {
    return "Welcome to Laravel 11";
});

Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('participant', 'UserController');
    Route::resource('reviewer', 'ReviewerController');
    Route::resource('symposium', 'SymposiumController');
    Route::get('summary', [SummaryController::class, 'index'])->name('summary');
});

Route::name('reviewer.')
    ->prefix('reviewer')
    ->namespace('App\Http\Controllers\Reviewer')
    ->middleware(['auth', 'role:reviewer|chief-editor|editor'])
    ->group(function () {
        Route::get('summary', [SummaryReviewerController::class, 'index'])->name('summary');
        Route::get('editor', [EditorController::class, 'index'])->name('editor.index');
        Route::get('/editor/assign-reviewer/{abstractId}', [EditorController::class, 'showAssignReviewer'])->name('editor.showAssignReviewer');
        Route::post('/editor/assign-reviewer/{abstractId}', [EditorController::class, 'assignReviewer'])->name('editor.assignReviewer');
        Route::get('/editor/edit-status/{abstractId}', [EditorController::class, 'showEditStatus'])->name('editor.showEditStatus');
        Route::post('/editor/edit-status/{abstractId}', [EditorController::class, 'updateStatus'])->name('editor.updateStatus');

        Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
        Route::get('/reviewer/review/{abstractId}', [ReviewController::class, 'showReviewForm'])->name('review.showReviewForm');
        Route::post('/reviewer/review/{abstractId}', [ReviewController::class, 'storeReview'])->name('review.storeReview');
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

Route::middleware('auth')->group(function () {
    Route::get('filepayments', [FilePaymentController::class, 'create'])->name('filepayments.create');
    Route::post('filepayments', [FilePaymentController::class, 'store'])->name('filepayments.store');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';
