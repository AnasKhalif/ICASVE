<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AbstractModel;
use App\Models\FullPaper;

class SummaryReviewerController extends Controller
{
    public function index()
    {
        $countCompletedReviews = AbstractModel::whereHas('abstractReviews', function (
            $query,
        ) {
            $query->where('reviewer_id', auth()->id());
        })->where('status', 'accepted')->count();

        $countCompletedPapers = FullPaper::whereHas('fullPaperReviews', function ($query) {
            $query->where('reviewer_id', auth()->id());
        })
            ->where('status', 'accepted')
            ->count();

        $allAbstracts = AbstractModel::count();
        $allFullPapers = FullPaper::count();
        $user = Auth::user();
        $reviewerCertificate = Certificate::where('user_id', $user->id)
            ->where('certificate_type', 'reviewer')
            ->first();

        return view('reviewer.summary', compact('countCompletedReviews', 'countCompletedPapers', 'allAbstracts', 'allFullPapers', 'reviewerCertificate'));
    }
}
