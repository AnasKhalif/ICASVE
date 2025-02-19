<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AbstractModel;
use App\Models\AbstractReview;

class ReviewController extends Controller
{
    public function index()
    {
        $reviewerId = auth()->id();
        $abstracts = AbstractModel::whereHas('abstractReviews', function ($query) use ($reviewerId) {
            $query->where('reviewer_id', $reviewerId);
        })
            ->where('status', 'under review')
            ->get();

        return view('reviewer.index', compact('abstracts'));
    }

    public function reviewCompleted()
    {
        $reviewerId = auth()->id();
        $abstracts = AbstractModel::whereHas('abstractReviews', function ($query) use ($reviewerId) {
            $query->where('reviewer_id', $reviewerId);
        })
            ->where('status', 'accepted')
            ->get();

        return view('reviewer.reviewCompleted', compact('abstracts'));
    }

    public function showReviewForm($abstractId)
    {
        $abstract = AbstractModel::findOrFail($abstractId);
        $formattedAuthors = $this->formatAuthors($abstract->authors);
        $formattedAffiliations = $this->formatAffiliations($abstract->affiliations);
        $abstractReview = AbstractReview::where('abstract_id', $abstractId)
            ->where('reviewer_id', auth()->id())
            ->first();

        return view('reviewer.review', compact('abstract', 'abstractReview', 'formattedAuthors', 'formattedAffiliations'));
    }

    private function formatAuthors($authors)
    {
        return preg_replace('/\[(\d+)\]/', '<sup>$1</sup>', $authors);
    }


    private function formatAffiliations($affiliations)
    {
        $formattedAffiliations = preg_replace('/\[(\d+)\]/', '<sup>$1</sup>', $affiliations);
        return nl2br($formattedAffiliations);
    }

    public function storeReview(Request $request, $abstractId)
    {
        $request->validate([
            'recommendation' => 'required|string',
            'comment' => 'nullable|string',
        ]);

        $abstractReview = AbstractReview::firstOrCreate(
            ['abstract_id' => $abstractId, 'reviewer_id' => auth()->id()],
            ['recommendation' => $request->recommendation, 'comment' => $request->comment]
        );

        if ($abstractReview->wasRecentlyCreated === false) {
            $abstractReview->update([
                'recommendation' => $request->recommendation,
                'comment' => $request->comment
            ]);
        }

        return redirect()->route('reviewer.review.index')->with('success', 'Review submitted successfully');
    }
}
