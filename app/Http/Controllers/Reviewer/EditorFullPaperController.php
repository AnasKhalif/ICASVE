<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FullPaper;
use App\Models\User;

class EditorFullPaperController extends Controller
{
    public function index()
    {
        $fullpapers = FullPaper::with(['fullPaperReviews.reviewer', 'abstract.symposium'])->paginate(10);

        return view('editor-fullpaper.index', compact('fullpapers'));
    }

    public function noReviewer()
    {
        $fullpapers = FullPaper::doesntHave('fullPaperReviews')
            ->orWhereHas('fullPaperReviews', function ($query) {
                $query->whereNull('comment');
            })
            ->paginate(10);

        return view('editor-fullpaper.noReviewer', compact('fullpapers'));
    }

    public function noDecision()
    {
        $fullpapers = FullPaper::with(['fullPaperReviews.reviewer', 'abstract.symposium'])
            ->where('status', 'under review')
            ->whereHas('fullPaperReviews', function ($query) {
                $query->whereNotNull('comment');
            })
            ->paginate(10);

        return view('editor-fullpaper.noDecision', compact('fullpapers'));
    }

    public function withDecision()
    {
        $fullpapers = FullPaper::with(['fullPaperReviews.reviewer', 'abstract.symposium'])
            ->where('status', 'accepted')
            ->paginate(10);

        return view('editor-fullpaper.withDecision', compact('fullpapers'));
    }

    public function revision()
    {
        $fullpapers = FullPaper::with(['fullPaperReviews.reviewer', 'abstract.symposium'])
            ->where('status', 'revision')
            ->paginate(10);

        return view('editor-fullpaper.revision', compact('fullpapers'));
    }

    public function showAssignReviewer($fullpaperId)
    {
        $fullpaper = FullPaper::findOrFail($fullpaperId);
        $reviewers = User::whereHas('roles', function ($query) {
            $query->where('name', 'reviewer');
        })->get();

        return view('editor-fullpaper.assignReviewer', compact('fullpaper', 'reviewers'));
    }

    public function assignReviewer(Request $request, $fullpaperId)
    {
        $fullpaper = FullPaper::findOrFail($fullpaperId);

        $existingReview = $fullpaper->reviewers()->wherePivot('full_paper_id', $fullpaperId)->first();

        if ($existingReview) {
            $fullpaper->reviewers()->updateExistingPivot($existingReview->id, ['reviewer_id' => $request->reviewer_id]);
        } else {
            $fullpaper->reviewers()->attach($request->reviewer_id);
        }

        return redirect()->route('reviewer.editor-fullpaper.index')->with('success', 'Reviewer berhasil diperbarui.');
    }


    public function showEditStatus($fullpaperId)
    {
        $fullpaper = FullPaper::findOrFail($fullpaperId);
        return view('editor-fullpaper.editStatus', compact('fullpaper'));
    }

    public function updateStatus(Request $request, $fullpaperId)
    {
        $fullpaper = FullPaper::findOrFail($fullpaperId);

        $request->validate([
            'status' => 'required|string|in:open,under review,accepted,revision,rejected'
        ]);

        $fullpaper->status = $request->status;
        $fullpaper->save();

        return redirect()->route('reviewer.editor-fullpaper.index')->with('success', 'Status updated successfully');
    }
}
