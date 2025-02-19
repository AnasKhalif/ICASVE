<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\FilePayment;
use App\Models\AbstractModel;
use App\Models\Symposium;
use App\Models\FullPaper;
use App\Models\Year;

class SummaryController extends Controller
{
    public function index()
    {
        $activeYear = Year::where('is_active', true)->first();

        if (!$activeYear) {
            return redirect()->back()->with('error', 'No active year set.');
        }

        $rolesToDisplay = ['indonesia-presenter', 'foreign-presenter', 'indonesia-participants', 'foreign-participants'];

        $totalUsers = User::whereHas('roles', function ($query) use ($rolesToDisplay) {
            $query->whereIn('name', $rolesToDisplay);
        })
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $totalAmountPayment = FilePayment::where('status', 'verified')
            ->whereYear('created_at', $activeYear->year)
            ->sum('amount');

        $verifiedPaymentsCount = FilePayment::where('status', 'verified')
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $unverifiedPaymentsCount = FilePayment::where('status', 'pending')
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $paymentProofUploaded = FilePayment::whereNotNull('file_path')
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $totalAbstracts = AbstractModel::where('status', 'accepted')
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $totalSymposiums = Symposium::whereYear('created_at', $activeYear->year)->count();

        $roleCounts = [];
        foreach ($rolesToDisplay as $role) {
            $roleCounts[$role] = User::whereHas('roles', function ($query) use ($role) {
                $query->where('name', $role);
            })
                ->whereYear('created_at', $activeYear->year)
                ->count();
        }

        $onsiteCount = User::whereHas('roles', function ($query) use ($rolesToDisplay) {
            $query->whereIn('name', $rolesToDisplay);
        })->where('attendance', 'onsite')
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $onlineCount = User::whereHas('roles', function ($query) use ($rolesToDisplay) {
            $query->whereIn('name', $rolesToDisplay);
        })->where('attendance', 'online')
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $acceptedForOral = AbstractModel::where('status', 'accepted')->where('presentation_type', 'Oral presentation')->whereYear('created_at', $activeYear->year)->count();
        $acceptedForOralPaid = AbstractModel::where('status', 'accepted')
            ->where('presentation_type', 'Oral presentation')
            ->whereHas('user.filePayment', function ($query) {
                $query->where('status', 'verified');
            })
            ->whereYear('created_at', $activeYear->year)
            ->count();

        $acceptedForPoster = AbstractModel::where('status', 'accepted')->where('presentation_type', 'Poster presentation')->whereYear('created_at', $activeYear->year)->count();
        $acceptedForPosterPaid = AbstractModel::where('status', 'accepted')
            ->where('presentation_type', 'Poster presentation')
            ->whereHas('user.filePayment', function ($query) {
                $query->where('status', 'verified');
            })->whereYear('created_at', $activeYear->year)->count();

        $submittedFullpaper = FullPaper::whereYear('created_at', $activeYear->year)->count();
        $fullpaperUnderReview = FullPaper::where('status', 'under review')->whereYear('created_at', $activeYear->year)->count();
        $fullpaperRevision = FullPaper::where('status', 'revision')->whereYear('created_at', $activeYear->year)->count();
        $fullpaperAccepted = FullPaper::where('status', 'accepted')->whereYear('created_at', $activeYear->year)->count();
        $fullpaperRejected = FullPaper::where('status', 'rejected')->whereYear('created_at', $activeYear->year)->count();

        $symposiums = Symposium::whereYear('created_at', $activeYear->year)
            ->withCount([
                'abstracts' => function ($query) use ($activeYear) {
                    $query->whereYear('created_at', $activeYear->year);
                },
                'abstracts as oral_presentation_count' => function ($query) use ($activeYear) {
                    $query->where('presentation_type', 'Oral Presentation')
                        ->whereYear('created_at', $activeYear->year);
                },
                'abstracts as poster_presentation_count' => function ($query) use ($activeYear) {
                    $query->where('presentation_type', 'Poster presentation')
                        ->whereYear('created_at', $activeYear->year);
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
