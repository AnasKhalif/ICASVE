<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewerCommittee;
use App\Models\OrganizingCommittee;

class OrganizingCommitteeController extends Controller
{
    public function showLandingPage()
    {
        $latestYear = OrganizingCommittee::max('year');

        $committees = OrganizingCommittee::where('year', $latestYear)
            ->orderBy('category')
            ->get();

        return view('landingpage.committee.organizing', compact('committees', 'latestYear'));
    }

    public function index(Request $request)
    {
        $years = OrganizingCommittee::select('year')->distinct()->orderBy('year', 'desc')->pluck('year');

        // Tambahkan opsi "All Years"
        $years->prepend('All Years');

        // Ambil tahun yang dipilih dari query parameter, default ke "All Years"
        $selectedYear = $request->query('year', 'All Years');

        // Ambil data berdasarkan tahun yang dipilih, atau semua data jika "All Years" dipilih
        $committees = $selectedYear === 'All Years'
            ? OrganizingCommittee::orderBy('year', 'desc')->orderBy('category')->get()
            : OrganizingCommittee::where('year', $selectedYear)->orderBy('category')->get();

        return view('landingpage-editor.committee.organizing.index', compact('committees', 'years', 'selectedYear'));
    }


    public function create()
    {
        return view('landingpage-editor.committee.organizing.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        OrganizingCommittee::create($request->all());

        return redirect()->route('landing.organizing.index')->with('success', 'Committee member added!');
    }

    public function edit($id)
    {
        $committee = OrganizingCommittee::findOrFail($id);
        return view('landingpage-editor.committee.organizing.edit', compact('committee'));
    }

    public function update(Request $request, $id)
    {
        $reviewerCommittee = ReviewerCommittee::findOrFail($id);
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
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
