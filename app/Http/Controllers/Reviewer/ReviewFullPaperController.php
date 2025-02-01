<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FullPaper;
use App\Models\FullPaperReview;

class ReviewFullPaperController extends Controller
{
    public function index()
    {
        $reviewerId = auth()->id();

        $fullPapers = FullPaper::whereHas('fullPaperReviews', function ($query) use ($reviewerId) {
            $query->where('reviewer_id', $reviewerId);
        })
            ->where('status', 'under review')
            ->get();

        return view('reviewer.fullpaperIndex', compact('fullPapers'));
    }

    public function reviewCompleted()
    {
        $reviewerId = auth()->id();

        $fullPapers = FullPaper::whereHas('fullPaperReviews', function ($query) use ($reviewerId) {
            $query->where('reviewer_id', $reviewerId);
        })
            ->where('status', 'accepted')
            ->get();

        return view('reviewer.fullpaperCompleted', compact('fullPapers'));
    }


    public function showReviewForm($fullpaperId)
    {
        $fullpaper = FullPaper::findOrFail($fullpaperId);
        $fullpaperReview = FullPaperReview::where('full_paper_id', $fullpaperId)
            ->where('reviewer_id', auth()->id())
            ->first();

        return view('reviewer.fullpaperReview', compact('fullpaper', 'fullpaperReview'));
    }

    public function storeReview(Request $request, $fullpaperId)
    {
        $request->validate([
            'comment' => 'nullable|string',
        ]);

        $fullpaperReview = FullPaperReview::firstOrCreate(
            ['full_paper_id' => $fullpaperId, 'reviewer_id' => auth()->id()],
        );

        if ($fullpaperReview->wasRecentlyCreated === false) {
            $fullpaperReview->update([
                'comment' => $request->comment
            ]);
        }

        return redirect()->route('reviewer.review-fullpaper.index')->with('success', 'Review submitted successfully');
    }
}
