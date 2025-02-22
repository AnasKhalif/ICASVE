<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewerCommittee;

class ReviewerCommitteeController extends Controller
{
    public function index()
    {
        $committees = ReviewerCommittee::all();
        return view('landingpage-editor.committee.reviewer-committee.index', compact('committees'));
    }
    public function create()
    {
        return view('landingpage-editor.committee.reviewer-committee.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
        ]);
        ReviewerCommittee::create($request->all());
        return redirect()->route('landing.reviewer-committee.index')->with('success', 'Reviewer Committee added successfully.');
    }
    public function edit(ReviewerCommittee $reviewerCommittee)
    {
        return view('landingpage-editor.committee.reviewer-committee.edit', compact('reviewerCommittee'));
    }
    public function update(Request $request, ReviewerCommittee $reviewerCommittee)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
        ]);
        $reviewerCommittee->update($request->all());
        return redirect()->route('landing.reviewer-committee.index')->with('success', 'Reviewer Committee updated successfully.');
    }
    public function destroy(ReviewerCommittee $reviewerCommittee)
    {
        $reviewerCommittee->delete();
        return redirect()->route('landing.reviewer-committee.index')->with('success', 'Reviewer Committee deleted successfully.');
    }
}
