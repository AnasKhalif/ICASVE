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
        $abstracts = AbstractModel::paginate(10);
        return view('editor.index', compact('abstracts'));
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

        $abstract->reviewers()->attach($request->reviewer_id);

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
