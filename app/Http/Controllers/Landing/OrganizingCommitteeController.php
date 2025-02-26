<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrganizingCommittee;

class OrganizingCommitteeController extends Controller
{
    public function showLandingPage()
{
     // Ambil tahun terbaru yang tersedia dalam database
     $latestYear = OrganizingCommittee::max('year');

     // Ambil data hanya untuk tahun terbaru
     $committees = OrganizingCommittee::where('year', $latestYear)
         ->orderBy('category')
         ->get();
 
     return view('landingpage.committee.organizing', compact('committees', 'latestYear'));
}

public function index(Request $request)
{
    // Ambil semua tahun yang tersedia dalam database
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
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $committee = OrganizingCommittee::findOrFail($id);
        $committee->update($request->all());

        return redirect()->route('landing.organizing.index')->with('success', 'Committee updated!');
    }

    public function destroy($id)
    {
        OrganizingCommittee::findOrFail($id)->delete();
        return redirect()->route('landing.organizing.index')->with('success', 'Committee deleted!');
    }
}
