<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use App\Models\ConferenceTitle;
use Illuminate\Http\Request;

class ConferenceTitleController extends Controller {
    public function index(Request $request)
    {
        $query = ConferenceTitle::orderByDesc('year');
    
        // Jika ada request filter tahun, tambahkan kondisi
        if ($request->has('year') && !empty($request->year)) {
            $query->where('year', $request->year);
        }
    
        $conferenceTitles = $query->get();
        $years = ConferenceTitle::distinct()->orderByDesc('year')->pluck('year');
    
        return view('landingpage-editor.landingpage.conference_title.index', compact('conferenceTitles', 'years'));
    }
    

    public function create() {
        return view('landingpage-editor.landingpage.conference_title.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        ConferenceTitle::create($request->all());

        return redirect()->route('landing.conference-title.index')->with('success', 'Conference Title created successfully.');
    }

    public function edit(ConferenceTitle $conferenceTitle) {
        return view('landingpage-editor.landingpage.conference_title.edit', compact('conferenceTitle'));
    }

    public function update(Request $request, ConferenceTitle $conferenceTitle) {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'year' => 'required|integer|min:2000|max:' . date('Y'),
        ]);

        $conferenceTitle->update($request->all());

        return redirect()->route('landing.conference-title.index')->with('success', 'Conference Title updated successfully.');
    }

    public function destroy(ConferenceTitle $conferenceTitle)
    {
        $conferenceTitle->delete();

        return redirect()->route('landing.conference-title.index')->with('success', 'Conference Title deleted successfully.');
    }
}
