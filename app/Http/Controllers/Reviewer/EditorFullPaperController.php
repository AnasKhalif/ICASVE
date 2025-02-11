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

        $request->validate([
            'reviewer_1_id' => 'required|exists:users,id',
            'reviewer_2_id' => 'required|exists:users,id|different:reviewer_1_id',
        ]);

        $fullpaper->reviewers()->detach();

        $fullpaper->reviewers()->attach([$request->reviewer_1_id, $request->reviewer_2_id]);

        $fullpaper->status = 'under review';
        $fullpaper->save();

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
