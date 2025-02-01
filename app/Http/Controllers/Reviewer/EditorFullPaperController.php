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

        $fullpaper->reviewers()->attach($request->reviewer_id);

        return redirect()->route('reviewer.editor-fullpaper.index')->with('success', 'Reviewer assigned and full paper status updated to under review');
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
            'status' => 'required|string|in:open,under review,accepted,rejected'
        ]);

        $fullpaper->status = $request->status;
        $fullpaper->save();

        return redirect()->route('reviewer.editor-fullpaper.index')->with('success', 'Status updated successfully');
    }
}
