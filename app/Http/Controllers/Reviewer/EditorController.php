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
        $abstract = AbstractModel::findOrFail($abstractId);
        $reviewers = User::whereHas('roles', function ($query) {
            $query->where('name', 'reviewer');
        })->get();

        return view('editor.assignReviewer', compact('abstract', 'reviewers'));
    }

    public function assignReviewer(Request $request, $abstractId)
    {
        $abstract = AbstractModel::findOrFail($abstractId);

        $request->validate([
            'reviewer_1_id' => 'required|exists:users,id',
            'reviewer_2_id' => 'required|exists:users,id|different:reviewer_1_id',
        ]);

        $abstract->reviewers()->detach();

        $abstract->reviewers()->attach([
            $request->reviewer_1_id => ['created_at' => now(), 'updated_at' => now()],
            $request->reviewer_2_id => ['created_at' => now(), 'updated_at' => now()],
        ]);

        $abstract->status = 'under review';
        $abstract->save();

        return redirect()->route('reviewer.editor.index')->with('success', 'Reviewer assigned and abstract status updated to under review');
    }

    public function showEditStatus($abstractId)
    {
        $abstract = AbstractModel::findOrFail($abstractId);
        return view('editor.editStatus', compact('abstract'));
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
