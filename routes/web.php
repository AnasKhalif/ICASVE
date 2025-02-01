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
use App\Http\Controllers\Reviewer\EditorController;
use App\Http\Controllers\Reviewer\ReviewController;
use App\Http\Controllers\Reviewer\EditorFullPaperController;
use App\Http\Controllers\Reviewer\ReviewFullPaperController;

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

        Route::get('/editor-abstract/no-reviewer', [EditorController::class, 'noReviewer'])->name('editor.noReviewer');
        Route::get('/editor-abstract/no-decision', [EditorController::class, 'noDecision'])->name('editor.noDecision');
        Route::get('/editor-abstract/with-decision', [EditorController::class, 'withDecision'])->name('editor.withDecision');

        Route::get('/editor-abstract/assign-reviewer/{abstractId}', [EditorController::class, 'showAssignReviewer'])->name('editor.showAssignReviewer');
        Route::post('/editor-abstract/assign-reviewer/{abstractId}', [EditorController::class, 'assignReviewer'])->name('editor.assignReviewer');

        Route::get('/editor-abstract/edit-status/{abstractId}', [EditorController::class, 'showEditStatus'])->name('editor.showEditStatus');
        Route::post('/editor-abstract/edit-status/{abstractId}', [EditorController::class, 'updateStatus'])->name('editor.updateStatus');

        Route::get('/review', [ReviewController::class, 'index'])->name('review.index');
        Route::get('/review-abstract/review-completed', [ReviewController::class, 'reviewCompleted'])->name('review.review-completed');

        Route::get('/review-abstract/{abstractId}', [ReviewController::class, 'showReviewForm'])->name('review.showReviewForm');
        Route::post('/review-abstract/{abstractId}', [ReviewController::class, 'storeReview'])->name('review.storeReview');

        Route::get('editor-fullpaper', [EditorFullPaperController::class, 'index'])->name('editor-fullpaper.index');

        Route::get('/editor-fullpaper/no-reviewer', [EditorFullPaperController::class, 'noReviewer'])->name('editor-fullpaper.noReviewer');
        Route::get('/editor-fullpaper/no-decision', [EditorFullPaperController::class, 'noDecision'])->name('editor-fullpaper.noDecision');
        Route::get('/editor-fullpaper/with-decision', [EditorFullPaperController::class, 'withDecision'])->name('editor-fullpaper.withDecision');
        Route::get('/editor-fullpaper/revision', [EditorFullPaperController::class, 'revision'])->name('editor-fullpaper.revision');

        Route::get('/editor-fullpaper/assign-reviewer/{fullpaperId}', [EditorFullPaperController::class, 'showAssignReviewer'])->name('editor-fullpaper.showAssignReviewer');
        Route::post('/editor-fullpaper/assign-reviewer/{fullpaperId}', [EditorFullPaperController::class, 'assignReviewer'])->name('editor-fullpaper.assignReviewer');

        Route::get('/editor-fullpaper/edit-status/{fullpaperId}', [EditorFullPaperController::class, 'showEditStatus'])->name('editor-fullpaper.showEditStatus');
        Route::post('/editor-fullpaper/edit-status/{fullpaperId}', [EditorFullPaperController::class, 'updateStatus'])->name('editor-fullpaper.updateStatus');

        Route::get('/review-fullpaper', [ReviewFullPaperController::class, 'index'])->name('review-fullpaper.index');
        Route::get('/review-fullpaper/review-completed', [ReviewFullPaperController::class, 'reviewCompleted'])->name('review-fullpaper.review-completed');

        Route::get('/review-fullpaper/{fullpaperId}', [ReviewFullPaperController::class, 'showReviewForm'])->name('review-fullpaper.showReviewForm');
        Route::post('/review-fullpaper/{fullpaperId}', [ReviewFullPaperController::class, 'storeReview'])->name('review-fullpaper.storeReview');
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
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
