<?php

namespace App\Http\Controllers\Reviewer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FullPaper;
use App\Models\User;
use App\Traits\FlashAlert;
use App\Mail\FullPaperAccepted;
use Illuminate\Support\Facades\Mail;

class EditorFullPaperController extends Controller
{
    use FlashAlert;

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
        $fullpaper = FullPaper::with('reviewers')->findOrFail($fullpaperId);
        $reviewers = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['reviewer', 'editor', 'chief-editor']);
        })->get();

        $assignedReviewer1 = $fullpaper->reviewers->first() ? $fullpaper->reviewers[0]->id : null;
        $assignedReviewer2 = $fullpaper->reviewers->count() > 1 ? $fullpaper->reviewers[1]->id : null;
        $assignedReviewer3 = $fullpaper->reviewers->count() > 2 ? $fullpaper->reviewers[2]->id : null;

        return view('editor-fullpaper.assignReviewer', compact('fullpaper', 'reviewers', 'assignedReviewer1', 'assignedReviewer2', 'assignedReviewer3'));
    }

    public function assignReviewer(Request $request, $fullpaperId)
    {
        $fullpaper = FullPaper::findOrFail($fullpaperId);

        $request->validate([
            'reviewer_1_id' => 'required|exists:users,id',
            'reviewer_2_id' => 'nullable|exists:users,id|different:reviewer_1_id',
            'reviewer_3_id' => 'nullable|exists:users,id|different:reviewer_1_id|different:reviewer_2_id',
        ]);

        if (!$request->reviewer_1_id && !$request->reviewer_2_id) {
            return back()->withErrors(['reviewer_1_id' => 'At least one reviewer must be assigned.']);
        }

        $fullpaper->reviewers()->detach();

        $reviewers = [];
        if ($request->reviewer_1_id) {
            $reviewers[$request->reviewer_1_id] = ['created_at' => now(), 'updated_at' => now()];
        }
        if ($request->reviewer_2_id) {
            $reviewers[$request->reviewer_2_id] = ['created_at' => now(), 'updated_at' => now()];
        }

        if ($request->reviewer_3_id) {
            $reviewers[$request->reviewer_3_id] = ['created_at' => now(), 'updated_at' => now()];
        }

        $fullpaper->reviewers()->attach($reviewers);

        $fullpaper->status = 'under review';
        $fullpaper->save();

        return redirect()->route('reviewer.editor-fullpaper.noReviewer')->with($this->alertAssign());
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

        if ($request->status === 'accepted') {
            $user = $fullpaper->abstract?->user;
            if ($user) {
                Mail::to($user->email)->send(new FullPaperAccepted($user, $fullpaper));
            }
        }

        return redirect()->route('reviewer.editor-fullpaper.index')->with($this->alertUpdated());
    }

    public function workLoad()
    {
        $reviewers = User::whereHas('roles', function ($query) {
            $query->whereIn('name', ['reviewer', 'editor', 'chief-editor']);
        })->get();

        $workloads = $reviewers->map(function ($reviewer) {
            $assigned = $reviewer->fullPaperReviews()->count();
            $completed = $reviewer->fullPaperReviews()->whereNotNull('comment')->count();
            $inReview = $assigned - $completed;

            return [
                'name' => $reviewer->name,
                'in_review' => $inReview,
                'completed' => $completed,
                'assigned' => $assigned
            ];
        });
        return view('editor-fullpaper.workload', compact('workloads'));
    }
}
