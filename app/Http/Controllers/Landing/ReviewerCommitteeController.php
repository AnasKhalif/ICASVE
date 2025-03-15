<?php

    namespace App\Http\Controllers\Landing;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use App\Models\ReviewerCommittee;
    use App\Models\Year;

    class ReviewerCommitteeController extends Controller
    {
        public function showLandingPage(Request $request)
        {

            $activeYear = Year::where('is_active', true)->value('year');
            $years = Year::orderBy('year', 'desc')->pluck('year');
            $selectedYear = $request->year ?? $activeYear ?? ($years->isNotEmpty() ? $years->first() : date('Y'));
            $reviewers = ReviewerCommittee::where('year', $selectedYear)
                ->orderBy('name', 'asc')
                ->get();
            return view('landingpage.committee.reviewer', compact('reviewers', 'years', 'selectedYear'));
        }

        public function index(Request $request)
        {
            
            $years = ReviewerCommittee::select('year')->distinct()->orderByDesc('year')->pluck('year');
            $selectedYear = $request->year ?? $years->first(); 
      
            $query = ReviewerCommittee::orderBy('year', 'desc')->orderBy('name', 'asc');
     
            if ($request->year && $request->year !== "all") {
                $selectedYear = $request->year;
                $query->where('year', $selectedYear);
            } else {
                $selectedYear = "all"; 
            }
    
            $reviewers = $query->get();
    
            return view('landingpage-editor.committee.reviewer.index', compact('reviewers', 'years', 'selectedYear'));
        }

        public function create()
        {
            return view('landingpage-editor.committee.reviewer.create');
        }

        public function store(Request $request)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'institution' => 'required|string|max:255',
                'year' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
            ]);

            ReviewerCommittee::create($request->all());

            return redirect()->route('landing.reviewer.index')
                ->with('success', 'Reviewer Committee added successfully.');
        }

        public function edit($id)
        {
            $reviewerCommittee = ReviewerCommittee::findOrFail($id);
            return view('landingpage-editor.committee.reviewer.edit', compact('reviewerCommittee'));
        }

        public function update(Request $request, $id)
        {
            $reviewerCommittee = ReviewerCommittee::findOrFail($id);
            $request->validate([
                'name' => 'required|string|max:255',
                'country' => 'required|string|max:255',
                'institution' => 'required|string|max:255',
                'year' => 'required|digits:4|integer|min:2000|max:' . date('Y'),
            ]);

            $reviewerCommittee->update($request->all());

            return redirect()->route('landing.reviewer.index')
                ->with('success', 'Reviewer Committee updated successfully.');
        }

        public function destroy($id)
        {
            $reviewerCommittee = ReviewerCommittee::findOrFail($id);
            $reviewerCommittee->delete();

            return redirect()->route('landing.reviewer.index')
                ->with('success', 'Reviewer Committee deleted successfully.');
        }
    }
