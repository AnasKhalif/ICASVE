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
use App\Http\Controllers\FilePaymentController;
use App\Http\Controllers\Admin\AbstractsController;
use App\Http\Controllers\Admin\OralController;
use App\Http\Controllers\Admin\VerifyPaymentController;
use App\Http\Controllers\Admin\CertificateController;
use App\Http\Controllers\Admin\ManualReceiptController;
use App\Http\Controllers\Admin\EmailCsvController;
use App\Http\Controllers\Landing\LandingPageController;
use App\Http\Controllers\Landing\SpeakerController;
use App\Http\Controllers\Admin\DownloadController;
use App\Http\Controllers\Admin\UploadController;
use App\Http\Controllers\Admin\ConferenceSettingController;
use App\Http\Controllers\Admin\YearController;
use App\Http\Controllers\Landing\RegistrationFeeController;
use App\Http\Controllers\Landing\FaqController;
use App\Http\Controllers\Landing\PublicationsJournalController;
use App\Http\Controllers\Landing\ConferenceProgramController;
use App\Http\Controllers\Landing\ContactController;
use App\Http\Controllers\Landing\OrganizingCommitteeController;
use App\Http\Controllers\Landing\ReviewerCommitteeController;
use App\Http\Controllers\Landing\SteeringCommitteeController;
use App\Http\Controllers\ConferenceProgramController as ConferenceProgram;
use App\Http\Controllers\GalleryLandingPageController;
use App\Http\Controllers\LandingPageController as LandingPage;
use App\Http\Controllers\Landing\VenueController;
use App\Http\Controllers\Landing\AboutController;
use App\Http\Controllers\Landing\DeadlineDateController;
use App\Http\Controllers\Landing\PosterController;
use App\Http\Controllers\Landing\LogoController;
use App\Http\Controllers\Landing\ConferenceTitleController;
use App\Http\Controllers\Landing\AbstractGuidelineController;
use App\Http\Controllers\Landing\FullpaperGuidelineController;
use App\Http\Controllers\Landing\PresentationGuidelineController;
use App\Http\Controllers\SteeringLandingPageController;
use App\Http\Controllers\ReviewerLandingPageController;
use App\Http\Controllers\Landing\ConferenceController;
use App\Http\Controllers\FaqLandingController;


Route::get('/', [LandingPage::class, 'index'])->name('home');

Route::get('/conference-program', [ConferenceProgram::class, 'index'])->name('conference.program');

Route::get('/gallery', [GalleryLandingPageController::class, 'index'])->name('gallery');

Route::prefix('committee')->group(function () {
    Route::get('/steering', [SteeringLandingPageController::class, 'index'])->name('committee.steering');

    Route::get('/reviewer', [ReviewerCommitteeController::class, 'showLandingPage'])
    ->name('committee.reviewer');

    Route::get('/organizing', [OrganizingCommitteeController::class, 'showLandingPage'])->name('committee.organizing');
});



Route::prefix('submission')->group(function () {
    Route::get('/abstract', [AbstractGuidelineController::class, 'showLandingPage'])
        ->name('submission.abstract');

    Route::get('/fullpaper', [FullpaperGuidelineController::class, 'showLandingPage'])
        ->name('submission.fullpaper');

    Route::get('/presentation', [PresentationGuidelineController::class, 'showLandingPage'])
        ->name('submission.presentation');
});


Route::prefix('archive')->group(function () {
    Route::get('/2023', function () {
        return view('landingpage.archive.index');
    })->name('archive.index');

    Route::get('/2024', function () {
        return view('landingpage.archive.index');
    })->name('archive.index');

    Route::get('/2025', function () {
        return view('landingpage.archive.index');
    })->name('archive.2025');
});

Route::get('/previous-conference', function () {
    return view('landingpage.prevconference.previous_conference');
})->name('previous.conference');

Route::get('/faq', [FaqLandingController::class, 'index'])->name('faq');

Route::get('/contact', function () {
    return view('landingpage.contact.contact');
})->name('contact');

Route::name('admin.')->prefix('admin')->namespace('App\Http\Controllers\Admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('participant', 'UserController');
    Route::get('abstracts-participant/{id}', 'UserController@showAbstract')->name('abstracts-participant.show');
    Route::get('abstracts-participant/{id}/download', 'UserController@downloadAbstractPdf')->name('abstracts-participant.downloadPdf');
    Route::get('abstracts-participant/{id}/acceptance-pdf', 'UserController@acceptancePdf')->name('abstracts-participant.acceptancePdf');
    Route::resource('reviewer', 'ReviewerController');
    Route::resource('symposium', 'SymposiumController');
    Route::resource('abstract', 'AbstractsController');
    Route::resource('oral', 'OralController');
    Route::get('summary', [SummaryController::class, 'index'])->name('summary');
    Route::get('payment', [VerifyPaymentController::class, 'index'])->name('payment.index');
    Route::get('payment/{id}/digital-pdf', [VerifyPaymentController::class, 'digitalPdf'])->name('payment.digitalPdf');
    Route::put('payment/{filePayment}/verify', [VerifyPaymentController::class, 'verify'])->name('payment.verify');
    Route::get('manual-receipt', [ManualReceiptController::class, 'create'])->name('manual-receipt.create');
    Route::post('manual-receipt', [ManualReceiptController::class, 'store'])->name('manual-receipt.store');
    Route::get('certificates', [CertificateController::class, 'index'])->name('certificates.index');
    Route::put('certificates/{id}/toggle', [CertificateController::class, 'toggleStatus'])->name('certificates.toggle');
    Route::get('email-csv', [EmailCsvController::class, 'index'])->name('email.csv');
    Route::get('abstract-book', [AbstractsController::class, 'showBySymposium'])->name('abstract.bySymposium');
    Route::get('abstract-download-all-pdf', [AbstractsController::class, 'downloadAllPdf'])->name('abstract.downloadAllPdf');
    Route::get('abstract-download-verified-pdf', [AbstractsController::class, 'downloadVerifiedPdf'])->name('abstract.downloadVerifiedPdf');
    Route::get('download-files', [DownloadController::class, 'index'])->name('download.index');
    Route::get('download/fullpaper', [DownloadController::class, 'downloadFullPaper'])->name('download.fullpaper');
    Route::get('download/payment-proof', [DownloadController::class, 'downloadPaymentProof'])->name('download.paymentProof');
    Route::get('upload', [UploadController::class, 'index'])->name('upload.index');
    Route::post('upload', [UploadController::class, 'store'])->name('upload.store');
    Route::get('upload/show/{type}', [UploadController::class, 'show'])->name('upload.show');
    Route::get('settings', [ConferenceSettingController::class, 'index'])->name('settings.index');
    Route::post('settings', [ConferenceSettingController::class, 'update'])->name('settings.update');
    Route::get('years', [YearController::class, 'index'])->name('years.index');
    Route::post('years', [YearController::class, 'store'])->name('years.store');
    Route::post('years/{id}/set-active', [YearController::class, 'setActive'])->name('years.setActive');
});

Route::name('reviewer.')
    ->prefix('reviewer')
    ->namespace('App\Http\Controllers\Reviewer')
    ->middleware(['auth', 'role:reviewer|chief-editor|editor'])
    ->group(function () {
        Route::get('summary', [SummaryReviewerController::class, 'index'])->name('summary');
        Route::get('editor-allabstract', [EditorController::class, 'index'])->name('editor.index');

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

        Route::get('editor-all-fullpaper', [EditorFullPaperController::class, 'index'])->name('editor-fullpaper.index');

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

Route::name('landing.')
    ->prefix('landing')
    ->namespace('App\Http\Controllers\Landing')
    ->middleware(['auth', 'role:landing-editor'])
    ->group(function () {
        Route::get('landingpage', [LandingPageController::class, 'index'])->name('landingpage.index');
        Route::resource('speakers', SpeakerController::class);
        Route::resource('registrationFee', 'RegistrationFeeController');
        Route::resource('faq', 'FaqController');
        Route::resource('publications-journal', 'PublicationsJournalController');
        Route::resource('conference-program', 'ConferenceProgramController');
        Route::resource('steering', SteeringCommitteeController::class);
        Route::resource('reviewer', ReviewerCommitteeController::class);
        Route::resource('organizing', OrganizingCommitteeController::class);
        Route::resource('contact', ContactController::class);
        Route::resource('gallery', 'GalleryController');
        Route::resource('venue', 'VenueController');
        Route::resource('abouts', AboutController::class);
        Route::resource('poster', PosterController::class);
        Route::resource('deadlines', DeadlineDateController::class);
        Route::resource('logos', LogoController::class);
        Route::resource('conference-title', ConferenceTitleController::class);
        Route::resource('fullpaper-guidelines', FullpaperGuidelineController::class);
        Route::resource('abstract-guidelines', AbstractGuidelineController::class);
        Route::resource('presentation-guidelines', PresentationGuidelineController::class);
        Route::resource('conference', ConferenceController::class);
    });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('filepayments', [FilePaymentController::class, 'create'])->name('filepayments.create');
    Route::post('filepayments', [FilePaymentController::class, 'store'])->name('filepayments.store');
    Route::get('filepayments/{id}/receipt', [FilePaymentController::class, 'receipt'])->name('filepayments.receipt');
});

Route::middleware('auth')->group(function () {
    Route::resource('abstracts', AbstractController::class);
    Route::get('abstracts/{id}/download-pdf', [AbstractController::class, 'downloadPdf'])->name('abstracts.downloadPdf');
    Route::get('abstracts/{id}/acceptance-pdf', [AbstractController::class, 'acceptancePdf'])->name('abstracts.acceptancePdf');
    Route::get('create/{abstractId}', [FullPaperController::class, 'create'])->name('fullpapers.create');
    Route::post('store/{abstractId}', [FullPaperController::class, 'store'])->name('fullpapers.store');
    Route::get('abstracts/{id}/certificate/{type}', [AbstractController::class, 'viewCertificate'])->name('abstracts.viewCertificate');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
