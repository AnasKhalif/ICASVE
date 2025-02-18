<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\FilePayment;
use App\Models\AbstractModel;
use App\Models\Symposium;
use App\Models\FullPaper;

class SummaryController extends Controller
{
    public function index()
    {
        $rolesToDisplay = ['indonesia-presenter', 'foreign-presenter', 'indonesia-participants', 'foreign-participants'];

        $totalUsers = User::whereHas('roles', function ($query) use ($rolesToDisplay) {
            $query->whereIn('name', $rolesToDisplay);
        })->count();

        $totalAmountPayment = FilePayment::where('status', 'verified')->sum('amount');

        $verifiedPaymentsCount = FilePayment::where('status', 'verified')->count();

        $unverifiedPaymentsCount = FilePayment::where('status', 'pending')->count();

        $paymentProofUploaded = FilePayment::whereNotNull('file_path')->count();

        $totalAbstracts = AbstractModel::where('status', 'accepted')->count();

        $totalSymposiums = Symposium::count();

        $roleCounts = [];
        foreach ($rolesToDisplay as $role) {
            $roleCounts[$role] = User::whereHas('roles', function ($query) use ($role) {
                $query->where('name', $role);
            })->count();
        }

        $onsiteCount = User::whereHas('roles', function ($query) use ($rolesToDisplay) {
            $query->whereIn('name', $rolesToDisplay);
        })->where('attendance', 'onsite')->count();

        $onlineCount = User::whereHas('roles', function ($query) use ($rolesToDisplay) {
            $query->whereIn('name', $rolesToDisplay);
        })->where('attendance', 'online')->count();

        $acceptedForOral = AbstractModel::where('status', 'accepted')->where('presentation_type', 'Oral presentation')->count();
        $acceptedForOralPaid = AbstractModel::where('status', 'accepted')
            ->where('presentation_type', 'Oral presentation')
            ->whereHas('user.filePayment', function ($query) {
                $query->where('status', 'verified');
            })->count();
        $acceptedForPoster = AbstractModel::where('status', 'accepted')->where('presentation_type', 'Poster presentation')->count();
        $acceptedForPosterPaid = AbstractModel::where('status', 'accepted')
            ->where('presentation_type', 'Poster presentation')
            ->whereHas('user.filePayment', function ($query) {
                $query->where('status', 'verified');
            })->count();

        $submittedFullpaper = FullPaper::count();
        $fullpaperUnderReview = FullPaper::where('status', 'under review')->count();
        $fullpaperRevision = FullPaper::where('status', 'revision')->count();
        $fullpaperAccepted = FullPaper::where('status', 'accepted')->count();
        $fullpaperRejected = FullPaper::where('status', 'rejected')->count();

        $symposiums = Symposium::withCount([
            'abstracts',
            'abstracts as oral_presentation_count' => function ($query) {
                $query->where('presentation_type', 'Oral Presentation');
            },
            'abstracts as poster_presentation_count' => function ($query) {
                $query->where('presentation_type', 'Poster presentation');
            }
        ])->get();

        return view('admin.summary', compact(
            'totalUsers',
            'totalAmountPayment',
            'totalAbstracts',
            'totalSymposiums',
            'onsiteCount',
            'onlineCount',
            'roleCounts',
            'verifiedPaymentsCount',
            'unverifiedPaymentsCount',
            'paymentProofUploaded',
            'acceptedForOral',
            'acceptedForOralPaid',
            'acceptedForPoster',
            'acceptedForPosterPaid',
            'submittedFullpaper',
            'fullpaperUnderReview',
            'fullpaperRevision',
            'fullpaperAccepted',
            'fullpaperRejected',
            'symposiums'
        ));
    }
}
