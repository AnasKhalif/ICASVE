<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ReviewerCommittee;

class ReviewerCommitteeController extends Controller
{
    public function index(Request $request)
    {
        // Ambil daftar tahun untuk dropdown filter
        $years = ReviewerCommittee::select('year')->distinct()->orderByDesc('year')->pluck('year');

        // Gunakan tahun terbaru sebagai default jika tidak ada yang dipilih
        $selectedYear = $request->year ?? $years->first();

        // Ambil reviewer berdasarkan tahun yang dipilih (jika "Semua Tahun" dipilih, tampilkan semua)
        $query = ReviewerCommittee::orderBy('year', 'desc')->orderBy('name', 'asc');
        if ($selectedYear !== "all") {
            $query->where('year', $selectedYear);
        }
        $reviewers = $query->get();

        return view('landingpage-editor.reviewer.index', compact('reviewers', 'years', 'selectedYear'));
    }


    public function create()
    {
        return view('landingpage-editor.reviewer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'year' => 'required|digits:4|integer|min:2000|max:' . date('Y'), // Validasi tahun
        ]);

        ReviewerCommittee::create($request->all());

        return redirect()->route('landing.reviewer.index')
            ->with('success', 'Reviewer Committee added successfully.');
    }

    public function edit($id)
    {
        $reviewerCommittee = ReviewerCommittee::findOrFail($id);
        return view('landingpage-editor.reviewer.edit', compact('reviewerCommittee'));
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

    public function showLandingPage()
    {
        // Ambil tahun terbaru dari database
        $latestYear = ReviewerCommittee::max('year');

        if ($latestYear) {
            // Ambil reviewer berdasarkan tahun terbaru
            $reviewers = ReviewerCommittee::where('year', $latestYear)
                ->orderBy('name', 'asc')
                ->get();
        } else {
            // Jika tidak ada data, buat koleksi kosong agar tidak error
            $reviewers = collect();
        }

        return view('landingpage.committee.reviewer', compact('reviewers', 'latestYear'));
    }
}
