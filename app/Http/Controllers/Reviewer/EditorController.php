<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AbstractModel;
use App\Models\User;

class EditorController extends Controller
{
    public function index()
    {
        $abstracts = AbstractModel::with('abstractReviews.reviewer')->paginate(10);
        return view('editor.index', compact('abstracts'));
    }

    public function noReviewer()
    {
        $abstracts = AbstractModel::doesntHave('abstractReviews')
            ->orWhereHas('abstractReviews', function ($query) {
                $query->whereNull('comment');
            })
            ->paginate(10);

        return view('editor.noReviewer', compact('abstracts'));
    }

    public function noDecision()
    {
        $abstracts = AbstractModel::with('abstractReviews.reviewer')
            ->where('status', 'under review')
            ->whereHas('abstractReviews', function ($query) {
                $query->whereNotNull('comment');
            })
            ->paginate(10);

        return view('editor.noDecision', compact('abstracts'));
    }

    public function withDecision()
    {
        $abstracts = AbstractModel::with('abstractReviews.reviewer')
            ->where('status', 'accepted')
            ->paginate(10);

        return view('editor.withDecision', compact('abstracts'));
    }

    public function showAssignReviewer($abstractId)
    {
        $abstract = AbstractModel::with('reviewers')->findOrFail($abstractId);

        $reviewers = User::whereHas('roles', function ($query) {
            $query->where('name', 'reviewer');
        })->get();

        $assignedReviewer1 = $abstract->reviewers->first() ? $abstract->reviewers[0]->id : null;
        $assignedReviewer2 = $abstract->reviewers->count() > 1 ? $abstract->reviewers[1]->id : null;

        return view('editor.assignReviewer', compact('abstract', 'reviewers', 'assignedReviewer1', 'assignedReviewer2'));
    }


    public function assignReviewer(Request $request, $abstractId)
    {
        $abstract = AbstractModel::findOrFail($abstractId);

        $request->validate([
            'reviewer_1_id' => 'nullable|exists:users,id',
            'reviewer_2_id' => 'nullable|exists:users,id|different:reviewer_1_id',
        ]);

        if (!$request->reviewer_1_id && !$request->reviewer_2_id) {
            return back()->withErrors(['reviewer_1_id' => 'At least one reviewer must be assigned.']);
        }

        $abstract->reviewers()->detach();

        $reviewers = [];
        if ($request->reviewer_1_id) {
            $reviewers[$request->reviewer_1_id] = ['created_at' => now(), 'updated_at' => now()];
        }
        if ($request->reviewer_2_id) {
            $reviewers[$request->reviewer_2_id] = ['created_at' => now(), 'updated_at' => now()];
        }

        $abstract->reviewers()->attach($reviewers);

        $abstract->status = 'under review';
        $abstract->save();

        return redirect()->route('reviewer.editor.index')->with('success', 'Reviewer assigned successfully');
    }


    public function showEditStatus($abstractId)
    {
        $abstract = AbstractModel::findOrFail($abstractId);
        $formattedAuthors = $this->formatAuthors($abstract->authors);
        $formattedAffiliations = $this->formatAffiliations($abstract->affiliations);
        return view('editor.editStatus', compact('abstract', 'formattedAuthors', 'formattedAffiliations'));
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

    public function updateStatus(Request $request, $abstractId)
    {
        $abstract = AbstractModel::findOrFail($abstractId);

        $request->validate([
            'status' => 'required|string|in:open,under review,accepted,rejected'
        ]);

        $abstract->status = $request->status;
        $abstract->save();

        return redirect()->route('reviewer.editor.index')->with('success', 'Status updated successfully');
    }
}
